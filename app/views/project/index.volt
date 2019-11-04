<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>项目 列表</title>
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
        
            {% include '/public/breadcrumb.volt' %}
            {% include '/public/paction.volt' %}
            {% set links = [['href':'/project/index','name':'配置对象'],['href':'/project/index','name':'列表']] %}
            {{ breadcrumb(links) }}

            <div>
                {% if where['pid'] ==0 %}
                    
                    <div class="alert alert-success" role="alert">顶级对象</div>

                {% else %}
                    <div class="alert alert-info" role="alert">{{pinfo.name}}({{pinfo.remark}}) 的配置对象集合</div>
                {% endif %}
            </div>
           
            
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>ID - PID -PPID</th>
                        <th>名字(备注)</th>
                        <th>类型</th>
                  
                        <th>内容</th>
                        <th>动作</th>
                    </tr>
                </thead>
                <tbody>
                    {% for item in info.items %}
                    <tr>
                        <th>
                        {{item.id}} - {{item.pid}} - {{item.ppid}}

                        </th>
                       <td>{{item.name}}({{item.remark}})</td>
                        <th>{{ttip[item.type]}}({{item.type}} )</th>
                        
                        
                        <td>
                            {% if (item.type=='index' or item.type =='array') %}
                                <a href="{{ url('/project/info',['id':item.id])}}">详情</a>
                            {% elseif(item.type=='inherit') %}
                                 <a href="{{ url('/project/info',['id':item.id])}}">详情</a>&nbsp;&nbsp;&nbsp;
                                 <a href="{{ url('/project/inherit',['id':item.id])}}">继承比对</a>
                            {% elseif(item.type=='merge') %}
                                {{ item.content }}
                                 <a href="{{ url('/project/merge',['id':item.id])}}">详情</a>&nbsp;&nbsp;&nbsp;

                            {% else %}
                            {{ item.content }} 
                            {% endif %}
                        </td>
                        <th>
                          {{ project_action(item) }}
                        </th>
                     
                    </tr>
                    {% endfor %}
                </tbody>

            </table>
                <div>
                    <button type="button" class="btn btn-primary">
                         <a href="/project/add" style="color:white">添加</a>
                    </button>
                   
                    {% if where['cid'] %}

                        <a class="btn btn-primary" href="/relation/addcp?cid={{where['cid']}}" style="color:white">
                            消费者绑定
                        </a>
                        <a class="btn btn-warning" href="/alc/index?cid={{where['cid']}}" style="color:white">
                            消费者 - ALC
                        </a>

                    {% endif %}
                </div>
            
        </div>

            
            {% include '/public/pagination.volt' %}
            {% set urldata = ['/consumer/index',[]] %}
            {{ pagination(info,urldata) }}

    </body>
</html>