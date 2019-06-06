<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>修改 ALC</title>
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
            {% include '/public/breadcrumb.volt' %}
            {% set links = [['href':'/alc/index','name':'ALC'],['name':'编辑']] %}
            {{ breadcrumb(links) }}
            {% include '/project/infomcaro.volt' %}
            <div style="width: 95%;margin-left: 3%">
                <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                      
                        
                        <th>名字</th>
                        <th>备注</th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <th>{{info.id}}</th>
                        <td>{{info.type}}</td>
                        <td>{{info.content}}</td>
                    </tr>
                  
                </tbody>

            </table>
            </div>
            <div style="width: 90%;">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                           
                            
                            <select name="type" id="">
                                {% for key,vall in alc_type %}
                                <option value="{{key}}">{{vall}}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control" 
                                   value="{{info.content}}" name="content">
                        </div>
                    </div>
                    
                        
             
                    <input type="hidden" name="id" value="{{info.id}}">
                        
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                            修改
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
               
            </div>
        </div>
                    <script>
                        $(document).ready(function(){
                            $('[name="type"]').val('{{info.type}}');
                        });
                    </script>
                    
    </body>
</html>