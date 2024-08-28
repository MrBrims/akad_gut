import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<InnerBlocks
				allowedBlocks={["create-block/stepswork-item"]}
				template={[
					["create-block/stepswork-item"],
					["create-block/stepswork-item"],
				]}
			/>
		</div>
	);
}
