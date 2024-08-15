<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/PHPMailer.php';

class Feedback
{
	public $ch;
	public $channel;
	public $title;
	public $subject;
	public $fc_source;
	public $score;
	public $id;
	public $manager;
	public $postMeta = [];

	public function __construct ()
	{
		add_filter('determine_current_user', [$this, 'jsonBasicAuthHandler'], 20);
		add_filter('rest_authentication_errors', [$this, 'jsonBasicAuthError']);

		add_action('wp_ajax_sendForm', [$this, 'mailer']);
		add_action('wp_ajax_nopriv_sendForm', [$this, 'mailer']);

		add_action('wp_ajax_sendWapp', [$this, 'sendWapp']);
		add_action('wp_ajax_nopriv_sendWapp', [$this, 'sendWapp']);

		// add_action('save_post', [$this, 'sendBitrix24'], 10, 3);
	}

	public function mailer ()
	{
		if (empty($_POST)) {
			wp_send_json_error(
				[
					'message' => __('Empty form!')
				]
			);
			// } else {
			// 	if (!empty($_POST['recaptcha_response'])) {
			// 		$url = RECAPTCHA_URL;
			// 		$key = RECAPTCHA_KEY;
			// 		$recaptcha = $_POST['recaptcha_response'];

			// 		$recaptcha = file_get_contents($url . '?secret=' . $key . '&response=' . $recaptcha);
			// 		$recaptcha = json_decode($recaptcha);

			// 		if ($recaptcha->score < 0.1) {
			// 			wp_send_json_error(
			// 				[
			// 					'message' => __('<p class="warning">You are robot \0-0/!</p>')
			// 				]
			// 			);
			// 		}
		}
		// $this->sanitizeData();
		$this->ch = json_decode(stripslashes($_COOKIE['fc_utm']))->utm_channel;
		$this->channel = $this->getChannel($this->ch);
		$this->title = $this->getTitle($this->ch);
		$this->subject = $this->getSubject($this->channel);
		$this->postMetaCookies();
		$this->postMetaUtm();
		$this->postMetaGeo();

		$res = new stdClass();
		$res->ToCRM = $this->sendToCRM();

		if (isset($res->ToCRM->id)) {
			$this->id = $res->ToCRM->id;
			$this->manager = $res->ToCRM->manager;
			$res->ToCRM->ok = true;
		} else {
			$this->id = 1;
			$this->manager = 'none';
			$res->ToCRM->ok = false;
			$res->ToCRM->id = 1;
			$res->ToCRM->id = 'none';
		}

		$res->ToTG = $this->sendToTG($this->id, $this->manager);
		$res->FileToTG = $this->sendFileToTG($this->id);
		// $res->FbAds = $this->facebookAds($this->id);
		$res->ToClient = $this->sendToClient($this->id);

		$result = [
			'ToCRM' => [
				'ok' => $res->ToCRM->ok,
				'id' => $res->ToCRM->id,
				'manager' => $res->ToCRM->manager
			],
			'ToTG' => [
				'ok' => $res->ToTG->ok
			],
			'ToClient' => [
				'ok' => $res->ToClient->ok
			]
		];
		if (!is_null($res->FileToTG)) {
			$result['FileToTG'] = [
				'ok' => isset($res->FileToTG->ok) ? $res->FileToTG->ok : false
			];
		}
		wp_send_json($result);
	}

	public function sendToCRM ()
	{
		try {
			$headers = array(
				'Content-Type: multipart/form-data',
				'Authorization:Basic ' . base64_encode(CRM_LOGIN . ':' . CRM_PASSWORD),
			);

			// Prepare POST data
			// $data = $_POST;
			$data = array_merge($_POST, $this->postMeta);
			if (!empty($_FILES['file']['tmp_name'])) {
				$fileUpload = new CURLFile($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
				$data['file'] = $fileUpload;
			}

			$ch = curl_init(CRM_URL);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 300);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

			$response = curl_exec($ch);
			$resDec = json_decode($response);
			if ($resDec === true || $resDec === null) {
				$resDec = (object) [
					'ok' => false,
					'status' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
					'error' => curl_error($ch),
					'res' => $response,
				];
			} else {
				$resDec = json_decode($response);
				$resDec->ok = true;
				$resDec->status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			}

			curl_close($ch);
			return $resDec;
		} catch (Exception $e) {
			return (object) [
				'ok' => false,
				'status' => 0,
				'error' => $e->getMessage(),
				'res' => '',
			];
		}
	}

	private function sendToTG ($id, $manager)
	{
		$text = "<b>{$this->title}</b>\r\n\n";
		$text .= "{$this->subject}\r\n\n";
		$text .= "<b>🥸 :</b> " . ($_POST['name'] ?? '') . "\r\n";
		$text .= "<b>📨 :</b> " . ($_POST['email'] ?? '') . "\r\n";
		$text .= "<b>📞 :</b> " . ($_POST['phone'] ?? '') . "\r\n";
		$text .= "<b>📌 :</b> " . ($_POST['type'] ?? '') . "\r\n";
		$text .= "<b>📎 :</b> " . ($_POST['specialization'] ?? '') . "\r\n";
		$text .= "<b>✍️ :</b> " . ($_POST['theme'] ?? '') . "\r\n";
		$text .= "<b>🗒 :</b> " . ($_POST['number'] ?? '') . "\r\n";
		$text .= "<b>🔥 :</b> " . ($_POST['deadline'] ?? '') . "\r\n";
		$text .= "<b>👣 :</b> " . ($this->fc_source ?? '') . "\r\n\n";
		$text .= "<b>🗃 :</b> " . $id . "\r\n";
		$text .= "<b>👧 :</b> " . $manager . "\r\n";
		$text .= "<b>⌚️ :</b> " . date('d.m.Y H:i:s') . "\r\n\n";
		$text .= "{$this->score} \r\n";
		// $text .= "<a href='https://akademily.de/wp-admin/post.php?post=" . $id . "&action=edit'><b>Клац</b></a>";

		$data = [
			'parse_mode' => 'html',
			'chat_id' => TG_CHAT_ID,
			'text' => $text
		];
		$response = json_decode(file_get_contents("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($data)));
		return $response;
	}

	public function sendFileToTG ($id)
	{
		// Проверка на наличие файла
		if ($_FILES['file']['name'] !== '') {
			$uploaddir = '../loads/' . $id . '/';
			// Проверка на существование директории
			if (!file_exists($uploaddir)) {
				mkdir($uploaddir, 0777, true);
			}
			// Загрузка
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			if (is_uploaded_file($_FILES['file']['tmp_name']) && move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
				$data = [
					'chat_id' => TG_CHAT_ID,
					'caption' => "🗃 : " . $id,
					'document' => new CURLFile($uploadfile)
				];

				$ch = curl_init("https://api.telegram.org/bot" . TG_TOKEN . "/sendDocument");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

				$response = curl_exec($ch);
				$resDec = json_decode($response);
				if ($resDec === true || $resDec === null) {
					$resDec = (object) [
						'ok' => false,
						'status' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
						'error' => curl_error($ch),
						'res' => $response,
					];
				} else {
					$resDec = json_decode($response);
					$resDec->ok = true;
					$resDec->status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				}

				curl_close($ch);
				return $resDec;
			}
		}
	}

	public function sendMail ($to, $name = '', $subj = 'Notification', $msg = 'Form sent', $file = false)
	{
		$mail = new PHPMailer(true);
		try {
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = MAIL_BOT_ADDRESS;
			$mail->Password = MAIL_BOT_PASSWORD;
			$mail->SMTPSecure = 'tls';
			$mail->CharSet = "utf-8";
			$mail->Port = 587;

			$mail->setFrom(MAIL_BOT_ADDRESS, 'Akademily');
			$mail->addAddress($to, $name);

			if ($file !== false) {
				$mail->addAttachment(DE_PATH . '/assets/docs/Warum wählt man uns.pdf');         //Add attachments
			}
			$mail->isHTML(true);
			$mail->Subject = $subj;
			$mail->Body = $msg;

			$mail->send();
			$response = new stdClass();
			$response->ok = true;
			$response->message = 'Email sent successfully';
		} catch (Exception $e) {
			$response = new stdClass();
			$response->ok = false;
			$response->message = $e->getMessage();
		}
		return $response;
	}

	public function sendToClient ($id)
	{
		$sbjToClient = 'Vielen Dank, dass Sie Akademily.de gewählt haben!';
		$msgToClient = '<p><strong>Hallo,</strong></p>
		<p><strong>Vielen Dank,</strong> dass Sie Akademily.de gewählt haben!</p>
		<p>Wir haben Ihre Anfrage erhalten und sind derzeit auf der Suche nach einem passenden Autor. Ein persönlicher Berater wird Sie in Kürze auf dem von Ihnen angegebenen Weg kontaktieren.</p>
		<p style="text-align: center;"><strong>Ihre Anfragenummer: ' . $id . '</strong></p>
		<p style="text-align: center;"><strong>Wenn Sie keine E-Mail erhalten haben, überprüfen Sie bitte Ihren Spam- und Werbeordner und markieren Sie unsere E-Mail als „Kein Spam“.</strong></p>
		<br>
		<p style="text-decoration: underline;"><strong>Eine kurze Schritt-für-Schritt-Anleitung, wie die Zusammenarbeit ablaufen wird:</strong></p>
		<ol>
			<li aria-level="1">Der Kundenberater klärt die Richtigkeit der Daten in Ihrer Anfrage sowie Ihre Wünsche für den Arbeitsablauf. Alle von Ihnen hinterlassenen Daten werden nicht an Dritte weitergegeben, und die gesamte Kommunikation ist vertraulich und verschlüsselt. Die Autoren erhalten lediglich die Aufgabenstellung.</li>
			<li aria-level="1">Der Berater informiert Sie über die verfügbaren Autoren, die für Ihre Anfrage zur Verfügung stehen, insbesondere über den akademischen Grad der Autoren, ihre Bewertungen, die Kosten des Auftrags sowie den Ablauf des Schreibprozesses. Außerdem beantwortet er Ihre Fragen.</li>
			<li aria-level="1">Wenn Ihnen unser Angebot zusagt, sendet Ihnen der Berater eine Rechnung zur Zahlung zu. Dieses Dokument stellt einen Vertrag zwischen Ihnen als Kunden und dem Auftragnehmer dar. Darin sind die wesentlichen Bedingungen des Auftrags sowie die Rechte und Pflichten aller Beteiligten festgehalten.</li>
			<li aria-level="1">Nach Erhalt der Zahlung/Vorauszahlung startet der Autor mit der Bearbeitung Ihres Auftrags.</li>
			<li aria-level="1">Zum angegebenen Termin, wenn möglich sogar früher, erhalten Sie die fertige Arbeit zusammen mit einem Bericht über die Einzigartigkeit (PlagScan).</li>
		</ol>
		<br>
		<p style="text-decoration: underline;"><strong>Was müssen Sie über den Auftragsablauf wissen?</strong></p>
		<ul>
			<li aria-level="1">Sobald Sie Ihre Bestellung bezahlt haben, wird Ihnen automatisch ein zweiter Kundenbetreuer zugewiesen. Dieser organisiert bei Bedarf den Kontakt mit dem Autor, überwacht den gesamten Arbeitsprozess und steht Ihnen jederzeit zur Verfügung, um Fragen zum Fortschritt der Arbeit zu beantworten.</li>
			<li aria-level="1">Sie können Teile des bereits geschriebenen Textes erhalten, um sich von der Qualität der Arbeit zu überzeugen. Ihr Seelenfrieden und Vertrauen sind uns wichtig.</li>
			<li aria-level="1">Wenn die Arbeit Anpassungen erfordert, ist das in Ordnung. Die Autoren nehmen die Anpassungen entsprechend Ihren Anmerkungen vor.</li>
			<li aria-level="1">Jeder abgeschlossene Auftrag durchläuft eine Qualitätskontrolle, wird von einem professionellen Korrekturleser lektoriert und auf Einzigartigkeit geprüft. Sie erhalten einen kostenlosen Einzigartigkeitsbericht zusammen mit der fertigen Arbeit.</li>
			<li aria-level="1">Nach dem Liefertermin garantieren wir Ihnen kostenlose Anpassungen. Wenn Sie etwas korrigieren möchten, tun wir dies für Sie kostenlos.</li>
		</ul>
		<br>
		<p><strong>Wenn Ihr Auftrag dringend ist, kontaktieren Sie uns bitte auf einem der folgenden Wege.</strong></p>
		<br>
		<hr>
		<p>Email: <a href="mailto:info@akademily.de">info@akademily.de</a></p>
		<p>Festnetz: <a href="tel:+493046690110">+49(304)669-01-10</a></p>
		<p style="text-align: center;"><em>Mit freundlichen Grüßen,<em></p>
		<p style="text-align: center;"><em>Ihr Team von Akademily!<em></p>';

		$res = $this->sendMail($_POST['email'], $_POST['name'], $sbjToClient, $msgToClient, false);
		return $res;
	}

	public function jsonBasicAuthHandler ($user)
	{
		global $wp_json_basic_auth_error;

		$wp_json_basic_auth_error = null;

		if (!empty($user)) {
			return $user;
		}

		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			return $user;
		}

		$username = $_SERVER['PHP_AUTH_USER'];
		$password = $_SERVER['PHP_AUTH_PW'];

		remove_filter('determine_current_user', 'json_basic_auth_handler', 20);

		$user = wp_authenticate($username, $password);

		add_filter('determine_current_user', 'json_basic_auth_handler', 20);

		if (is_wp_error($user)) {
			$wp_json_basic_auth_error = $user;
			return null;
		}

		$wp_json_basic_auth_error = true;

		return $user->ID;
	}

	public function jsonBasicAuthError ($error)
	{
		if (!empty($error)) {
			return $error;
		}

		global $wp_json_basic_auth_error;

		return $wp_json_basic_auth_error;
	}

	public function sendWapp ()
	{
		$channel = json_decode(stripslashes($_COOKIE['fc_utm']))->utm_channel;
		$clientGeo = $this->getGeo();
		date_default_timezone_set('Europe/Minsk');
		$clickTime = new DateTime();

		$text = "<b>UG-GWC.de WhatsApp клик 🥸</b>\r\n\n";
		$text .= "<b>👣 : {$channel}</b>\r\n";
		$text .= "<b>📱 : {$clientGeo->ip}</b>\r\n\n";
		$text .= "<b>🌐 : {$clientGeo->country_name}</b>\r\n";
		$text .= "<b>🏠 : {$clientGeo->region}</b>\r\n";
		$text .= "<b>⌚️ : {$clickTime->format('Y-m-d H:i:s')}</b>";

		$data = [
			'parse_mode' => 'html',
			'chat_id' => TG_CHANNEL_ID,
			'text' => $text
		];
		$res = file_get_contents("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($data));
		return $res;
	}

	public function getGeo ()
	{
		$client_ip = $_SERVER['REMOTE_ADDR'];
		// проверка для локалки
		// $client_ip = '84.244.8.172';

		$api = 'https://json.geoiplookup.io/' . $client_ip;

		$ch = curl_init($api);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);

		$response = json_decode($response);

		$geo = (object) [
			'ip' => $response->ip,
			'country_name' => $response->country_name,
			'region' => $response->region,
		];
		return $geo;
	}

	public function getChannel ($ch)
	{
		if ($ch == 'cpc') {
			return 'K';
		} elseif ($ch == 'direct') {
			return 'D';
		} elseif ($ch == 'media') {
			return 'M';
		} else {
			if (isset($_GET['utm_source'])) {
				return 'K';
			} else {
				return 'O';
			}
		}
	}

	public function getTitle ($ch)
	{
		if ($ch == 'cpc') {
			return 'Новая заявка! 💰';
		} elseif ($ch == 'direct') {
			return 'Новая заявка! 💫';
		} elseif ($ch == 'media') {
			return 'Новая заявка! 🤩';
		} else {
			return 'Новая заявка! 🤑';
		}
	}

	public function getSubject ($ch)
	{
		$title = sprintf(
			'%s | %s | %s',
			$ch,
			Helpers::urlPath(),
			$this->formNameFromID()
		);
		$this->postMeta['subject'] = $title;
		return $title;
	}

	public function formNameFromID (): string
	{
		$formArr = array(
			'form-author' => 'Форма авторов',
			'form-big' => 'Большая форма',
			'form-medium' => 'Средняя форма',
			'form-first' => 'Форма 1 экран',
			'form-small' => 'Малая форма',
			'form-care' => 'Форма заботы',
			'form-popup' => 'Форма попап',
			'form-bigpromo' => 'Форма промо',
			'blitz-form' => 'Форма блиц',
			'hero-form' => 'Форма 1 экран',
			'big-form' => 'Большая форма',
			'middle-form' => 'Средняя форма',
			'sidebar-form' => 'Боковая форма',
		);

		if (!empty($_POST['form-id']) && array_key_exists($_POST['form-id'], $formArr)) {
			return $formArr[$_POST['form-id']];
		} else {
			return 'Форма без ID';
		}
	}

	public function postMetaCookies ()
	{
		foreach ($_COOKIE as $key => $value) {
			if (
				in_array($key, [
					'browser',
					'cookieCook',
					'fc_page',
					'lc_page',
					'gift',
					'is_mobile',
					'os',
					'refer',
					'time_passed',
					'user_agent',
				])
			) {
				$this->postMeta[$key] = $value;
			}
		}
	}

	public function postMetaGeo ()
	{
		$clientGeo = $this->getGeo();
		if (isset($clientGeo)) {
			foreach ($clientGeo as $key => $value) {
				$this->postMeta[$key] = $value;
			}
		}
	}

	public function postMetaUtm ()
	{
		if (isset($_COOKIE['fc_utm'])) {
			$decCookie = json_decode(stripslashes($_COOKIE['fc_utm'])); //Декодируем JSON из кук
			foreach ($decCookie as $key => $value) {
				if ($key == 'utm_source') {
					$this->fc_source = $value;
				}
				$this->postMeta[$key] = $value;
			}
		} elseif (isset($_GET['utm_source'])) {
			$this->fc_source = $_GET['utm_source'] . ' (из GET)';
			$this->postMeta['utm_source'] = $_GET['utm_source'] . ' (из GET)';
		}
	}
}

new Feedback();