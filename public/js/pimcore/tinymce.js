const defaultConfig = {
  toolbar1:
    "undo redo | blocks | " +
    "bold italic | alignleft aligncenter " +
    "alignright alignjustify | link | table | bullist numlist outdent indent | removeformat | code | hilight",
  extended_valid_elements:
    "a[class|href|target|title|onclick|rel|data-mce-href|id],mark[class],span[class]",
  allow_script_urls: true,
  link_class_list: [
    { title: "Text-Link", value: "" },
    { title: "Button Default", value: "btn btn-default" },
    { title: "Outline", value: "btn btn-default btn-outline-default" },
  ],

  formats: {
    mark: {
      inline: "mark",
      selector: "mark",
      classes: "highlight",
    },
    span: {
      inline: "span",
      selector: "span",
    },
  },

  setup: function (editor) {
    editor.ui.registry.addToggleButton("hilight", {
      text: "HI",
      onAction: function (_) {
        editor.focus();
        var isHighlighted =
          editor.formatter.match("mark") && editor.formatter.match("span");

        if (!isHighlighted) {
          editor.formatter.apply("span");
          editor.formatter.apply("mark");
        } else {
          editor.formatter.remove("mark");
          editor.formatter.remove("span");
        }
      },
    });
  },
};

pimcore.document.editables.wysiwyg = pimcore.document.editables.wysiwyg || {};
pimcore.document.editables.wysiwyg.defaultEditorConfig = defaultConfig;
