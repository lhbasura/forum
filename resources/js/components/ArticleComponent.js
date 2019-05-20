Vue.component('article-component', {
    props: {
        initValue: {
         //   type: Object, // 格式是数组
         //   default: () => ({}), // 默认是个空数组
            _token:'',
            body:''
        }
    },
    data() {
        return {
            comments: [],
            newComment:{
                user_id:this.initValue.user_id,
                discussion_id:this.initValue.discussion_id,
                _token:this.initValue._token,
                body:''
            },
        };
    },
    created() {
        console.log(this.initValue)
        // this.comments=this.initValue;
        // console.log('crated!!')
        // $.each(this.initValue,function (index,item) {
        //     console.log(index,":",item)
        // })

    },
    methods: {
        onSubmitForm: function (e) {
            e.preventDefault();
            console.log(this.newComment)
            this.$http.post('/comment',this.newComment).then(function (res) {
                this.comments.push(this.newComment);
                this.newComment={
                    user_id:this.initValue.user_id,
                    discussion_id:this.initValue.discussion_id,
                    _token:this.initValue._token,
                    body:''
                };
                console.log("I changed it");
            }, function () {
                console.log('请求失败处理');
            });
        }
    }
});
