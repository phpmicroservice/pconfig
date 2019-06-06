<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>增加 ALC</title>
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
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
                        <input type="string" class="form-control" 
                               v-model="relation2"
                            name="relation2">
                    </div>

                    <div class="col-sm-6">
                        
                        

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
                relation2:0,
                tips:{
                    'ca':''
                }
            },
            methods: {
                
            },
            watch:{
                
            }
        })
    </script>

</body>

</html>