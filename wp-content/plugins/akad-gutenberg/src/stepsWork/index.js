import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";

import metadata from "./block.json";
import Edit from "./edit";
import Save from "./save";
import "./stepsWorkItems";

registerBlockType(metadata.name, {
	edit: Edit,
	save: Save,
});
