<template>
    <div class="container mx-auto my-10 px-6 md:px-12">
        <div class="flex justify-between items-center">
            <div class="flex-1">
                <h3 class="text-gray-700 text-3xl font-semibold mb-2">Add Article</h3>
                <p class="font-light">
                    This is the place to add new article.
                </p>
            </div>
            <div class="w-48 text-right">
                <a :href="route('articles.index')"
                   class="bg-green-600 text-gray-200 rounded hover:bg-green-500 px-6 py-3 focus:outline-none ">List
                    Article</a>
            </div>
        </div>
        <div class="w-3/4 bg-white mt-16 px-6 py-12 rounded-lg shadow-lg">
            <form @submit.prevent.stop="submit"
                  method="POST"
                  enctype="multipart/form-data">
                <div class="mb-6">
                    <label class="block text-gray-600 font-light mb-2">Article Title</label>
                    <BaseInput v-model="form.title"/>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-600 font-light mb-2">Select Categories</label>
                    <select name="categories[]" id="categories" class="w-full border" multiple
                            data-placeholder="Choose your categories"
                            data-container-css-class="px-2 border border-gray-400 focus:border-green-500"
                            data-dropdown-css-class="bg-gray-100 border-green-500">
                        <!--                        @foreach($categories as $item)-->
                        <!--                        <option class="py-4" value="{{$item->name}}">{{$item->name}}</option>-->
                        <!--                        @endforeach-->
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-600 font-light mb-2">Select Tags</label>
                    <select name="tags" id="tags" class="w-full border" multiple data-placeholder="Choose your tags"
                            data-container-css-class="px-2 border border-gray-400 focus:border-green-500"
                            data-dropdown-css-class="bg-gray-100 border-green-500">
                        <!--                        @foreach($tags as $item)-->
                        <!--                        <option class="py-4" value="{{$item->name}}">{{$item->name}}</option>-->
                        <!--                        @endforeach-->
                    </select>
                </div>
                <div class="markdown-body mb-2">
                    <label class="block text-gray-600 font-light mb-2">Description</label>
                    <BaseEditor v-model="form.body" name="body"/>
                </div>

                <div class="mb-6">
                    <input type="file" accept="image/*" @input="form.image = $event.target.files[0]">
                </div>
                <div class="pb-6">
                    <button type="submit"
                            class="float-right bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-8 py-2 focus:outline-none">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import BaseEditor from "@/components/BaseEditor.vue";
import useRoute from "../../../composable/useRoute";
import BaseInput from "../../../components/Form/BaseInput.vue";
import {useForm} from "@inertiajs/vue3";

const route = useRoute()

const props = defineProps({
    article: {
        required: true,
        type: Object
    }
})

const form = useForm(() => ({
    title: props.article.title,
    body: props.article.body,
    image: null,
    _method: 'put'
}))

const submit = () => {
    form.post(route('articles.update', props.article.id))
}
</script>
