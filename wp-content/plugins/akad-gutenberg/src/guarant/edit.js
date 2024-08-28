import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<InnerBlocks
				allowedBlocks={["create-block/guarant-item"]}
				template={[
					["create-block/guarant-item"],
					["create-block/guarant-item"],
				]}
			/>
		</div>
	);
}
