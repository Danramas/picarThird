<template>
    <el-upload
        class="upload-demo"
        action="/api/upload/"
        name="file[]"
        :on-success="handleChange"
        multiple
        :limit="5">
        <el-button size="small" type="primary">Click to upload</el-button>
        <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
    </el-upload>
</template>
<script>
    import {eventBus} from "../app";
    export default {
        methods: {
            handleChange(response, file, fileList) {
                eventBus.$emit('setLastImage', response.hashedName)
            },
        }
    }
</script>
