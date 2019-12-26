<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ALC 列表</title>
       {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
            
            {% include '/public/breadcrumb.volt' %}
            {% set links = [['href':'/alc/index','name':'权限控制'],['name':'列表']] %}
            {{ breadcrumb(links) }}

            <div style="width: 95%;margin-left: 3%">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名字</th>
                            <th>类型</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for item in info.items %}
                        <tr>
                            <th>{{item.id}}</th>
                            <td>{{item.name}}</td>
                            <td>{{item.type}}</td>
                            <td>{{item.content}}</td>
                            <th>
                                <a href="/consumer/index?aid={{item.id}}">用户</a>
                                <a href="/alc/edit?id={{item.id}}">编辑</a>
                                {% if where['cid'] %}
                                <a href="/relation/relieve?type=ca&relation2={{item.id}}&relation={{where['cid']}}">解除关系</a>
                                {% endif %}
                            </th>
                        </tr>
                        {% endfor %}
                    </tbody>

                </table>
                    
                <div>
                    <button type="button" class="btn btn-primary">
                         <a href="/alc/add" style="color:white">添加ALC</a>
                    </button>
                    {% if where['cid'] %}

                         <a   class="btn btn-primary" href="/relation/addca?cid={{where['cid']}}" style="color:white">
                         消费者绑定
                         </a>

                         <a   class="btn btn-warning" href="/project/index?cid={{where['cid']}}" style="color:white">
                          消费者 - 对象
                          </a>

                    {% endif %}
                    
                </div>
                    
                <div>
                    {% include '/public/pagination.volt' %}
                    {% set urldata = ['/alc/index',where] %}
                    {{ pagination(info,urldata) }}    
                </div>
            </div>
                
            
            
        </div>
                
                
        </div>


    </body>
</html>