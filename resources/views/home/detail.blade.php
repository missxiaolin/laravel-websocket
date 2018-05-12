<?php

use \App\Http\Controllers\Resource;

Resource::getInstance()->setTitle('直播详情页');
Resource::getInstance()->extJs([
    'pages/home/detail'
]);
Resource::getInstance()->extCss([
    'css/home/detail'
]);
?>
@extends("layout.live")
@section("content")
    <header class="header xxl-font">
        <i class="icon iconfont icon-fanhui back" id="back"></i>
        马刺vs火箭赛况
    </header>
    <div class="content">
        <div class="poster">
            <img src="{!! isset($host) ? $host : ''!!}/images/match-poster.png" class="post-img"/>
            <div class="poster-title">
                <div class="poster-title-team">
                    <img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="40px" height="40px">
                    <div>马刺(50)</div>
                </div>
                <div>VS</div>
                <div class="poster-title-team">
                    <img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="40px" height="40px">
                    <div>火箭(52)</div>
                </div>
            </div>
        </div>
        <div class="tab-nav">
            <div class="active">赛况</div>
            <div>聊天室</div>
            <div>数据</div>
        </div>
        <div class="tab-block">
            <div id="match-result">
                <div class="frame">
                    <h3 class="frame-header">
                        <i class="icon iconfont icon-shijian"></i>第一节 01：30
                    </h3>
                    <div class="frame-item">
                        <span class="frame-dot"></span>
                        <div class="frame-item-author">
                            <img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="20px" height="20px"/> 马刺
                        </div>
                        <p>08:44 暂停 常规暂停</p>
                        <p>08:44 帕克 犯规 个人犯规 2次</p>
                    </div>
                    <div class="frame-item">
                        <span class="frame-dot"></span>
                        <div class="frame-item-author">
                            singwa(评论员)
                        </div>
                        <p>01:44 </p>
                        <p>01:46 犯规 个人犯规 Ruan</p>
                    </div>
                </div>
            </div>
            <div id="comments" class="hidden comments">

                <div class="comment-form">
                    <form id="chat-form" onsubmit="return false;">
                        <input type="hidden" name="game_id" value="1">
                        <input id="discuss-box" type="text" name="content" placeholder="别憋着，说点啥~~ 回车既发射"></input>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div id="match-data" class="hidden match-data">
                <div class="match-score">
                    <div class="match-team-info">
                        <img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="40px" height="40px"/>
                        <div>火箭</div>
                    </div>
                    <div class="match-score-result">
                        <div style="font-size: .8rem;color: red;">第一小节 01：40</div>
                        <div style="font-size: 1.2rem; color:red;">
                            <span>21</span>
                            <span>Live</span>
                            <span>22</span>
                        </div>
                        <div style="font-size: .8rem; color:#888;">NBA常规赛</div>
                    </div>
                    <div class="match-team-info">
                        <img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="40px" height="40px"/>
                        <div>雷霆</div>
                    </div>
                </div>
                <div class="match-report">
                    <h3 class="sub-title">赛况</h3>
                    <div class="match-report-row row-title">
                        <span>球队</span>
                        <span>1TH</span>
                        <span>2TH</span>
                        <span>3TH</span>
                        <span>4TH</span>
                        <span>总分</span>
                    </div>
                    <div class="match-report-row">
                        <span><img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="30px" height="30px"/></span>
                        <span>20</span>
                        <span>-</span>
                        <span>-</span>
                        <span>20</span>
                        <span>40</span>
                    </div>
                    <div class="match-report-row">
						<span>
							<img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="30px" height="30px"/>
						</span>
                        <span>15</span>
                        <span>-</span>
                        <span>-</span>
                        <span>30</span>
                        <span>40</span>
                    </div>
                </div>
                <div class="mvp">
                    <h3 class="sub-title">本场最佳</h3>
                    <div>
                        <div class="mvp-player">
                            <img src="{!! isset($host) ? $host : ''!!}/images/pa.png" width="50px;" height="40px"/>
                            <div class="mvp-player-info">
                                <div>9</div>
                                <div>帕克</div>
                            </div>
                        </div>
                        <div class="mvp-score">
                            <span>10</span>
                            <span class="mvp-score-label">得分</span>
                            <span>12</span>
                        </div>
                        <div class="mvp-player">
                            <div class="mvp-player-info">
                                <div>13</div>
                                <div>哈登</div>
                            </div>
                            <img src="{!! isset($host) ? $host : ''!!}/images/ha.png" width="50px;" height="40px"/>
                        </div>
                    </div>
                    <div>
                        <div class="mvp-player">
                            <img src="{!! isset($host) ? $host : ''!!}/images/pa.png" width="50px;" height="40px"/>
                            <div class="mvp-player-info">
                                <div>9</div>
                                <div>帕克</div>
                            </div>
                        </div>
                        <div class="mvp-score"><span>10</span><span class="mvp-score-label">助攻</span><span>9</span>
                        </div>
                        <div class="mvp-player">
                            <div class="mvp-player-info">
                                <div>3</div>
                                <div>保罗</div>
                            </div>
                            <img src="{!! isset($host) ? $host : ''!!}/images/bao.png" width="50px;" height="40px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection