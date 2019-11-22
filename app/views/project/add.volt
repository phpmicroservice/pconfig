<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>增加 项目 - {{ sitename }}</title>
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
            {% include '/public/breadcrumb.volt' %}
            {% set links = [['href':'/project/index','name':'配置对象'],['name':'详情']] %}
            {{ breadcrumb(links) }}
            {% include '/project/infomcaro.volt' %}
            
            <div style="width: 90%;">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control"
                               value=""  name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control" 
                                   value="" name="remark">
                        </div>
                    </div>
                    
                        
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control" 
                                   value="" name="content">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">类型</label>
                        <div class="col-sm-10">
                           
                            <select class="form-control" name="type">
                                {% for key,vall in ttip %}
                                <option value="{{key}}">{{vall}}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">父级ID</label>
                        <div class="col-sm-10">
                            <input type="int" class="form-control" 
                                   value="{{pid}}" name="pid">
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                                提交
                            </button>
                            {% if pid %}
                                <a href="/project/index?pid={{ pid }}">
                                    父级对象
                                </a>
                            {% endif %}

                        </div>
                    </div>
                </form>
            </div>
            <div>
               
            </div>
        </div>

    </body>
</html>