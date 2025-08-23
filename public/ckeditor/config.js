/**
 * @license Copyright (c) 2003-2025, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here.
    config.language = "id";
    config.uiColor = "#f8f9fa";

    // Extra Plugins termasuk codesnippet
    config.extraPlugins = "lineutils,widget,codesnippet";

    // Toolbar configuration
    config.toolbarGroups = [
        { name: "clipboard", groups: ["clipboard", "undo"] },
        { name: "editing", groups: ["find", "selection", "spellchecker"] },
        { name: "links" },
        { name: "insert" },
        { name: "forms" },
        { name: "tools" },
        { name: "document", groups: ["mode", "document", "doctools"] },
        { name: "others" },
        "/",
        { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
        {
            name: "paragraph",
            groups: ["list", "indent", "blocks", "align", "bidi"],
        },
        { name: "styles" },
        { name: "colors" },
        { name: "about" },
    ];

    // Remove some buttons
    config.removeButtons = "Underline,Subscript,Superscript";

    // Set the most common block elements.
    config.format_tags = "p;h1;h2;h3;pre";

    // Simplify the dialog windows.
    config.removeDialogTabs = "image:advanced;link:advanced";

    // Allow all content
    config.allowedContent = true;

    // Height
    config.height = 400;

    // File upload
    config.filebrowserUploadMethod = "form";

    // Code Snippet Theme
    config.codeSnippet_theme = "monokai_sublime";
};
