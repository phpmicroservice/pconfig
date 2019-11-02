create table alc
(
    id      int auto_increment comment '自增（主键）'
        primary key,
    type    enum ('ip', 'token', 'object') not null comment '权限类型',
    content varchar(200)                   not null comment '内容'
)
    comment '权限对象表';

create table consumers
(
    name   varchar(30)  not null comment '名字',
    id     int auto_increment comment '自增'
        primary key,
    remark varchar(200) not null comment '备注'
);

create table log
(
    id      int auto_increment
        primary key,
    content text            not null,
    type37  tinyint(2)      not null,
    time    int default 999 not null,
    message text            not null comment '消息'
)
    charset = utf8;

create table project
(
    id      int auto_increment comment '自增'
        primary key,
    name    varchar(50)                                                    not null comment '名字',
    type    enum ('index', 'array', 'string', 'int', 'decimal', 'inherit') not null comment '类型 有序对象,关联对象，字符串，整形，浮点型  ,合并',
    content varchar(100)                                                   not null comment '内容',
    pid     int default 0                                                  not null comment '上级id',
    remark  varchar(200)                                                   not null comment '备注信息',
    ppid    int                                                            not null comment '顶级ＩＤ',
    constraint name
        unique (name, pid)
)
    comment '配置对象表';

create table relation
(
    id       int auto_increment comment '自增（主键）'
        primary key,
    type     varchar(100) not null comment '关联类型',
    relation varchar(100) not null comment '关联关系'
)
    comment '关系表';


INSERT INTO `project` (`id`, `name`, `type`, `content`, `pid`, `remark`, `ppid`)
VALUES (NULL, 'admin', 'array', '', '0', '管理员信息', '0'),
       (NULL, 'username', 'string', 'admin', '1', '用户名', '0'),
       (NULL, 'password', 'string', '$2y$10$Hp7Vu.nihPjbZV1R3A3SQ.B5WO14./DmW6gWNH3v0YqT1Ugtcyl.m', '1', '密码', '0')