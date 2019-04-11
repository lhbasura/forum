Vue.component('article-component', {
    props:{
        initValue: {
            type: Array, // 格式是数组
            default: () => ([]), // 默认是个空数组
        }
    },
    data() {
        return {
            comments:[]
        };
    },
    created(){
        console.log(this.initValue)
        // this.comments=this.initValue;
        // console.log('crated!!')
        // $.each(this.initValue,function (index,item) {
        //     console.log(index,":",item)
        // })

    }
});
