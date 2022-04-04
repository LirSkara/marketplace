const Search = {
    data() {
        return {
            searchString: '',
            articles: [],
            articlesarray: []
        }
    },
    methods: {
        line() {
            if(this.articles == '') {
                var prom = this.articles
                $.ajax({    
                    type: "GET", 
                    url: '/search',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        data.forEach(function(elem) {
                            prom.push({
                                name: elem['name']
                            })
                        })
                    }
                })
            }
            
            this.articlesarray = this.articles,
            searchString = this.searchString;
            
            if(!searchString){
                if(searchString != ''){
                    return articlesarray;
                }
            }
            
            searchString = searchString.trim().toLowerCase();
            this.articlesarray = this.articlesarray.filter(function(item){
                if(item.name.toLowerCase().indexOf(searchString) !== -1){
                    return item;
                }
            })
            
            // Возвращает массив с отфильтрованными данными.
            return this.articlesarray
        }
    }
}
Vue.createApp(Search).mount('#app')