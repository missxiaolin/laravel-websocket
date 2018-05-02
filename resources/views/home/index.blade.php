@extends("layout.live")
@section("content")
    <div>
        <header class="header">
            赛程
            <!--用户处于登录状态时，将该按钮隐藏-->
            <a href="./login.html">
                <!-- <i class="icon iconfont icon-wode my"></i> -->
                <span class="my">登录</span>
            </a>
        </header>
        <div class="content">
            <div class="match">
                <h2>今天 3月13日 星期二</h2>
                <a href="./detail.html">
                    <div class="match-item">
                        <div class="match-item-info">
                            <div class="match-time">
                                08: 00
                                <img src="{!! isset($host) ? $host : ''!!}/images/match.png" width="25px"
                                     height="25px"/>
                            </div>
                            <div>NBA常规赛</div>
                        </div>
                        <div class="match-item-teams isLive">
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="25px"
                                         height="25px"/>
									马刺
								</span>
                                <span>79</span>
                            </div>
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="25px"
                                         height="25px"/>
									火箭
								</span>
                                <span>80</span>
                            </div>
                        </div>
                        <div class="match-item-result isLive">
                            <div>图片直播</div>
                            <div>进行中</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="match">
                <h2>今天 3月14日 星期三</h2>

                <a href="./detail.html">
                    <div class="match-item">
                        <div class="match-item-info normal-font">
                            <div class="match-time">
                                08: 00
                                <img src="{!! isset($host) ? $host : ''!!}/images/match.png" width="25px"
                                     height="25px"/>
                            </div>
                            <div>NBA常规赛</div>
                        </div>
                        <div class="match-item-teams">
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="25px"
                                         height="25px"/> 马刺
								</span>
                                <span>-</span>
                            </div>
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="25px"
                                         height="25px"/> 火箭
								</span>
                                <span>-</span>
                            </div>
                        </div>
                        <div class="match-item-result">
                            <div>图片直播</div>
                        </div>
                    </div>
                </a>
                <a href="./detail.html">
                    <div class="match-item">
                        <div class="match-item-info normal-font">
                            <div class="match-time">
                                08: 00
                                <img src="{!! isset($host) ? $host : ''!!}/images/match.png" width="25px"
                                     height="25px"/>
                            </div>
                            <div>NBA常规赛</div>
                        </div>
                        <div class="match-item-teams">
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="25px"
                                         height="25px"/> 马刺
								</span>
                                <span>-</span>
                            </div>
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="25px"
                                         height="25px"/> 火箭
								</span>
                                <span>-</span>
                            </div>
                        </div>
                        <div class="match-item-result">
                            <div>图片直播</div>
                        </div>
                    </div>
                </a>
                <a href="./detail.html">
                    <div class="match-item">
                        <div class="match-item-info normal-font">
                            <div class="match-time">
                                08: 00
                                <img src="{!! isset($host) ? $host : ''!!}/images/match.png" width="25px"
                                     height="25px"/>
                            </div>
                            <div>NBA常规赛</div>
                        </div>
                        <div class="match-item-teams">
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="25px"
                                         height="25px"/> 马刺
								</span>
                                <span>-</span>
                            </div>
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="25px"
                                         height="25px"/> 火箭
								</span>
                                <span>-</span>
                            </div>
                        </div>
                        <div class="match-item-result">
                            <div>图片直播</div>
                        </div>
                    </div>
                </a>
                <a href="./detail.html">
                    <div class="match-item">
                        <div class="match-item-info normal-font">
                            <div class="match-time">
                                08: 00
                                <img src="{!! isset($host) ? $host : ''!!}/images/match.png" width="25px"
                                     height="25px"/>
                            </div>
                            <div>NBA常规赛</div>
                        </div>
                        <div class="match-item-teams">
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team1.png" width="25px"
                                         height="25px"/> 马刺
								</span>
                                <span>-</span>
                            </div>
                            <div>
								<span>
									<img src="{!! isset($host) ? $host : ''!!}/images/team2.png" width="25px"
                                         height="25px"/> 火箭
								</span>
                                <span>-</span>
                            </div>
                        </div>
                        <div class="match-item-result">
                            <div>图片直播</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection