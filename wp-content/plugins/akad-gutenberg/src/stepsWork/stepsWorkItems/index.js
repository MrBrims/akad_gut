import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import Edit from "./edit";
import Save from "./save";

registerBlockType("create-block/stepswork-item", {
	title: __("Step Work Item", "akad-gutenberg"),
	description: __("Nested step work blocks", "akad-gutenberg"),
	icon: "welcome-add-page",
	parent: ["create-block/stepswork-block"],
	attributes: {
		title: {
			type: "string",
			source: "html",
			selector: "h3",
		},
		text: {
			type: "string",
			source: "html",
			selector: "p",
		},
		button: {
			type: "string",
			source: "html",
			selector: "a",
		},
		image_url: {
			type: "string",
			source: "attribute",
			selector: "img",
			attribute: "src",
		},
		image_alt: {
			type: "string",
			source: "attribute",
			selector: "img",
			attribute: "alt",
			default: "",
		},
		image_id: {
			type: "number",
		},
	},
	edit: Edit,
	save: Save,
});
