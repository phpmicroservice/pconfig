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

create table z_1
(
    id    int(10) auto_increment
        primary key,
    id_re int(10)         not null,
    name  varchar(70)     not null,
    year  int             not null,
    years int             not null,
    year2 int default 999 not null,
    year3 int default 999 not null,
    constraint name
        unique (name)
)
    charset = utf8;

create table z_qqqq
(
    id    int(10) auto_increment
        primary key,
    id_re int(10)     not null,
    name  varchar(70) not null,
    year  int         not null,
    years int         not null,
    constraint name
        unique (name),
    constraint z_21_id_re_z_1_id
        foreign key (id_re) references z_1 (id)
)
    charset = utf8;

