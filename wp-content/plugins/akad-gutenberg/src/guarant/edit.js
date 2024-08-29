import {
	InnerBlocks,
	InspectorControls,
	useBlockProps,
} from "@wordpress/block-editor";
import { PanelBody, RadioControl } from "@wordpress/components";
import { __ } from "@wordpress/i18n";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { option } = attributes;
	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Настройки блока", "akad-gutenberg")}>
					<RadioControl
						label={__("Область отображения", "akad-gutenberg")}
						help={__(
							"От выбора зависит, какое количество колонок будет отображаться",
							"akad-gutenberg",
						)}
						selected={option}
						options={[
							{ label: "Без сайтбара", value: "option-one" },
							{ label: "С сайтбаром", value: "option-two" },
						]}
						onChange={(val) => {
							setAttributes({ option: val });
						}}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<InnerBlocks
					allowedBlocks={["create-block/guarant-item"]}
					template={[
						["create-block/guarant-item"],
						["create-block/guarant-item"],
					]}
				/>
			</div>
		</>
	);
}
