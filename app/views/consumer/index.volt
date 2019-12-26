<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>消费者 列表 - {{ sitename }}</title>
        
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
            
            
            
        
            {% include '/public/breadcrumb.volt' %}
            {% set links = [['href':'/consumer/index','name':'消费者'],['name':'列表']] %}
            {{ breadcrumb(links) }}

            <div style="width: 95%;margin-left: 3%">
                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名字</th>
                            <th>备注</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for item in info.items %}
                        <tr>
                            <th>{{item.id}}</th>
                            <td>{{item.name}}</td>
                            <td>{{item.remark}}</td>
                            <th>
                                <a href="/alc/index?cid={{item.id}}">权限</a>
                                
                                <a href="/project/index?cid={{item.id}}">对象</a>
                                
                                <a href="/consumer/edit?id={{item.id}}">编辑</a>
                                <a href="/consumer/delete?id={{item.id}}">删除</a>
                            </th>

                        </tr>
                        {% endfor %}
                    </tbody>

                </table>
                    
                <div>
                    <button type="button" class="btn btn-primary">
                         <a href="/consumer/add" style="color:white">添加</a>
                    </button>
                    
                </div>
                    
                <div>
                    {% include '/public/pagination.volt' %}
                    {% set urldata = ['/consumer/index',where] %}
                    {{ pagination(info,urldata) }}    
                </div>
            </div>
                
            
            
        </div>

            
            

    </body>
</html>