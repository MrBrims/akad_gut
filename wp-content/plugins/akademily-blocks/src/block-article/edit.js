import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<article {...useBlockProps()}>
			<InnerBlocks />
		</article>
	);
}
