<template>
    <div>
        <div class="media pt-4" v-for="comment in comments">
            <div class="media-left">
                <a href="#">
                    <img class="mr-2 rounded" :src="comment.user.avatar" style="width: 48px;height: 48px;">
                </a>
            </div>
            <div class="media-body">
                <h6 class="media-heading">{{comment.user.name}}</h6>

                {{comment.body}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                comments: [
                    {
                        user: {name: 'lhb', avatar: 'http://forum.test/uploads/avatar/63_1552396642_head.jpeg',},
                        body: 'abcd'
                    },
                ]
            }
        }
    }
</script>


