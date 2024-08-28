import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import Edit from "./edit";
import Save from "./save";

registerBlockType("create-block/qualification-item", {
	title: __("Qualification Items", "akad-gutenberg"),
	description: __("Nested qualification blocks", "akad-gutenberg"),
	icon: "welcome-add-page",
	parent: ["create-block/qualification-block"],
	attributes: {
		title: {
			type: "string",
			source: "html",
			selector: "p",
		},
		tippy: {
			type: "string",
			source: "attribute",
			selector: "span",
			attribute: "data-tippy-content",
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
