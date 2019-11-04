<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> {% if type == 'ca' %} 消费者 ALC 绑定{% else %}消费者 对象 绑定{% endif %}

    </title>
    {% include '/public/head.volt' %}
</head>

<body>
    <div id='app'>
        {#            导航#}
        {% include '/public/nav.volt' %}
        {% include '/public/breadcrumb.volt' %}
        {% set links = [['href':'/relation/index','name':'ALC'],['name':'增加']] %}
        {{ breadcrumb(links) }}
        {% include '/project/infomcaro.volt' %}

        <div style="width: 90%;">
            <div>
                
            </div>
            
            <form class="form-horizontal" method="post" action="/relation/add">
                <div class="form-group">
                    <label class="col-sm-2 control-label">类型</label>
                    <div class="col-sm-4">
                        <input type="string" class="form-control" 
                               v-model="type" 
                            name="type">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">对象1</label>
                    <div class="col-sm-3">
                        <input type="string" class="form-control" 
                               v-model="relation"  
                            name="relation">
                    </div>
                            <div class="col-sm-6">
                                消费者名字:{{ cinfo.name }} 
                            </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">对象2</label>
                    <div class="col-sm-1">
                        <input type="string" class="form-control" 
                               v-model="relation2"
                            name="relation2">
                    </div>

                    <div class="col-sm-2">

                        <input type="string" class="form-control"
                               v-model="relationseach"
                               placeholder="搜索对象,输入名字"
                               name="relationseach">

                    </div>
                    <div class="col-sm-3">

                        <ul v-if="type == 'cp'">
                            <li v-for="p in plist" @click="xuanzhong(p)">ID:
                                <span v-html="p.id"></span>
                                name:
                                <span v-html="p.name"></span>
                                remark:
                                <span v-html="p.remark"></span>
                                type :
                                <span v-html="p.type"></span>
                            </li>
                        </ul>

                        <ul v-if="type == 'ca'">
                            <li v-for="p in plist" @click="xuanzhong(p)">ID:
                                <span v-html="p.id"></span>
                                name:
                                <span v-html="p.name"></span>

                                type :
                                <span v-html="p.type"></span>
                            </li>
                        </ul>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">
                            增加
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div>

        </div>
    </div>

    <script>

        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                type: '{{ type }}',
                relation: '{{ cinfo.id }} ',
                relationseach: "",
                relation2:0,
                tips:{
                    'ca':''
                },
                plist: {}
            },
            methods: {
                xuanzhong: function (p) {
                    console.log(p)
                    this.relation2 = p.id
                }
            },
            watch:{
                type: function () {
                    if (this.type == 'cp') {
                        window.document.title = "消费者和对象绑定"
                    } else {
                        window.document.title = "消费者和ALC绑定"
                    }
                },
                relationseach: function (new1) {
                    if (this.type == 'cp') {
                        $.getJSON('/Project/search', {
                            search: this.relationseach
                        }, (res) => {
                            this.plist = res.items
                        });
                    } else {
                        $.getJSON('/alc/index', {
                            search: this.relationseach
                        }, (res) => {
                            this.plist = res.items
                        });
                    }


                }
            }
        })
    </script>

</body>

</html>