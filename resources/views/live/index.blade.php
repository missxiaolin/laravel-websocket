<?php
use \App\Http\Controllers\Resource;
Resource::getInstance()->setTitle('后台');
Resource::getInstance()->extJs([
    'js/lib/layui/layui',
    'pages/live/index',
]);
Resource::getInstance()->extCss([
    'css/live/index'
]);
?>
@extends("layout.live")
@section("content")
    <div class="x-body">
        <form class="layui-form">

            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>第几节
                </label>
                <div class="layui-input-inline">
                    <select id="type" name="type" class="valid">
                        <option value="1">第一节</option>
                        <option value="2">第二节</option>
                        <option value="3">第三节</option>
                        <option value="4">第四节</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>球队
                </label>
                <div class="layui-input-inline">
                    <select id="team_id" name="team_id" class="valid">
                        <option value="0">请选择</option>
                        <option value="1">马刺</option>
                        <option value="4">火箭</option>
                    </select>
                </div>
            </div>


            <div class="layui-form-item layui-form-text">
                <label for="desc" class="layui-form-label">
                    赛况内容
                </label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" id="content" name="content" class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label for="desc" class="layui-form-label">
                    赛况图
                </label>
                <!--dom结构部分-->
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">

                    </div>
                    <div id="filePicker" class="layui-btn layui-btn-normal">
                        选择图片
                        <input type="file" id="addPicture_product" name="file" class="add-img-click" >
                    </div>
                </div>

            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button type="submit" class="layui-btn" lay-filter="add" id="submit-btn" lay-submit="">
                    增加
                </button>
            </div>
        </form>
    </div>
@endsection