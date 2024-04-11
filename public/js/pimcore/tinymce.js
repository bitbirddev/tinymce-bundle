const defaultConfig = {
  toolbar1:
    "undo redo | blocks | " +
    "bold italic | alignleft aligncenter " +
    "alignright alignjustify | link | table | bullist numlist outdent indent | removeformat | code | hi",
  extended_valid_elements:
    "a[class|href|target|title|onclick|rel|data-mce-href|id],mark[class],span[class]",
  allow_script_urls: true,
  link_class_list: [
    { title: "Text-Link", value: "" },
    { title: "Button Default", value: "btn btn-default" },
    { title: "Outline", value: "btn btn-default btn-outline-default" },
  ],

  formats: {
    customMark: {
      inline: "mark",
      selector: "mark",
      classes: "highlight",
    },
    customSpan: {
      inline: "span",
      selector: "span",
    },
  },

  setup: function (editor) {
    editor.ui.registry.addToggleButton("hi", {
      text: "HI",
      onAction: function (_) {
        editor.focus();
        var isHighlighted =
          editor.formatter.match("customMark") &&
          editor.formatter.match("customSpan");

        if (!isHighlighted) {
          editor.formatter.apply("customSpan");
          editor.formatter.apply("customMark");
        } else {
          editor.formatter.remove("customMark");
          editor.formatter.remove("customSpan");
        }
      },
    });
  },
};

pimcore.document.editables.wysiwyg = pimcore.document.editables.wysiwyg || {};
pimcore.document.editables.wysiwyg.defaultEditorConfig = defaultConfig;
