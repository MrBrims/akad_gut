import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import Edit from "./edit";
import Save from "./save";

registerBlockType("create-block/guarant-item", {
	title: __("Guarant Item", "akad-gutenberg"),
	description: __("Nested guarant blocks", "akad-gutenberg"),
	icon: "welcome-add-page",
	parent: ["create-block/guarant-block"],
	attributes: {
		title: {
			type: "string",
			source: "html",
			selector: ".new-guarant__item-title",
		},
		text: {
			type: "string",
			source: "html",
			selector: ".new-guarant__item-text",
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
