@extends("layout.live")
@section("content")
    <header class="header xxl-font">
        <i class="icon iconfont icon-fanhui back" id="back"></i>
        马刺vs火箭赛况
        <!--用户处于登录状态时，将该按钮隐藏-->
        <a href="./login.html">
            <i class="icon iconfont icon-wode my"></i>
        </a>
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
                <div class="frame">
                    <h3 class="frame-header">
                        <i class="icon iconfont icon-shijian"></i>第二节 01：40
                    </h3>
                    <div class="frame-item">
                        <span class="frame-dot"></span>
                        <div class="frame-item-author">
                            <img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="20px" height="20px"/> 火箭
                        </div>
                        <p>比赛如火如荼~~~</p>
                        <p>
                            <img src="{!! isset($host) ? $host : ''!!}/images/1.png" width="40%"/>
                        </p>
                    </div>
                    <div class="frame-item">
                        <span class="frame-dot"></span>
                        <div class="frame-item-author">
                            singwa(评论员)
                        </div>
                        <p>08:44:41 火箭队请求暂停 常规暂停</p>
                        <p>08:44:40 哈登进攻犯规 个人犯规3次</p>
                    </div>
                </div>
            </div>
            <div id="comments" class="hidden comments">
                <div class="comment">
                    <span>xixi</span>
                    <span>赞~</span>
                </div>
                <div class="comment">
                    <span>xixi</span>
                    <span>赞~哈登mvp</span>
                </div>
                <div class="comment">
                    <span>singwa</span>
                    <span>哈登+克里斯-保罗 必定能夺冠，加油火箭！</span>
                </div>
                <div class="comment">
                    <span>mooc</span>
                    <span>詹姆斯去火箭吧~</span>
                </div>
                <div class="comment">
                    <span>singwa2</span>
                    <span>这场比赛太精彩了</span>
                </div>
                <div class="comment">
                    <span>singwa</span>
                    <span> 火箭目前位列西部第一，在击败独行侠之后，他们已经领先勇士1.5个胜场，而马刺的处境则是较为尴尬，他们目前拿到了37胜29负，只比身后的快船、掘金和爵士多0.5个胜场，如果马刺赢下火箭，他们将会继续保住西部前7的位置。</span>
                </div>
                <div class="comment">
                    <span>xixi</span>
                    <span>赞~</span>
                </div>
                <div class="comment">
                    <span>xixi</span>
                    <span>赞~dfdfgkkksds分担分担分担分担浮动</span>
                </div>
                <div class="comment">
                    <span>singwa</span>
                    <span>《烈火如歌》最近真是吸粉无数，各种话题随随便便就有成千上万的阅读量，本剧的点击量也轻轻松松破了十亿。看来热巴的高颜值和周渝民男神的实力演技，获得了大家的广泛肯...[详情]</span>
                </div>
                <div class="comment">
                    <span>xixi</span>
                    <span>赞~</span>
                </div>
                <div class="comment">
                    <span>xixi</span>
                    <span>赞~dfdfgkkksds分担分担分担分担浮动</span>
                </div>
                <div class="comment">
                    <span>singwa</span>
                    <span>《烈火如歌》最近真是吸粉无数，各种话题随随便便就有成千上万的阅读量，本剧的点击量也轻轻松松破了十亿。看来热巴的高颜值和周渝民男神的实力演技，获得了大家的广泛肯...[详情]</span>
                </div>
                <div class="comment-form">
                    <input type="text" placeholder="别憋着，说点啥~~ 回车既发射"></input>
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