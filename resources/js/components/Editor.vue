<template>
  <editor
    :name="name"
    :value="value"
    imageUploadUrl="/admin/upload/image"
    @ImageUploadSuccess="ImageUploadSuccess"
  ></editor>
</template>
<script>
import Editor from "simplemde-vue";
export default {
  props: ["name", "value"],
  components: { Editor },
  methods: {
    ImageUploadSuccess: function(simplemde, response) {
      simplemde.codemirror.replaceSelection(
        "![Image Text](" + response.data.link + ")"
      );
    }
  }
};
</script>
<style>
.editor-toolbar.fullscreen {
  z-index: 10 !important;
}
.CodeMirror-fullscreen {
  z-index: 10 !important;
}
</style>
