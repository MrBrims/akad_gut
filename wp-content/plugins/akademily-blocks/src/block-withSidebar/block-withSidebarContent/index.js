import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import save from "./save";
import "./style.scss";

registerBlockType(metadata.name, {
	parent: ["create-block/block-wich-sidebar"],
	edit: Edit,
	save,
});
