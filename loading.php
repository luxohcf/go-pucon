<style type="text/css">

#divLoading {
  position: fixed;
  _position: absolute;
  z-index: 99;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity:0.6;
  background-color:#ffffff;
  _height: expression(document.body.offsetHeight + "px");
}

.bubblingG {
    text-align: center;
    width:150px;
    height:94px;
}

.bubblingG span {
    display: inline-block;
    vertical-align: middle;
    width: 19px;
    height: 19px;
    margin: 47px auto;
    background: #1E93C9;
    -moz-border-radius: 94px;
    -moz-animation: bubblingG 1.3s infinite alternate;
    -webkit-border-radius: 94px;
    -webkit-animation: bubblingG 1.3s infinite alternate;
    -ms-border-radius: 94px;
    -ms-animation: bubblingG 1.3s infinite alternate;
    -o-border-radius: 94px;
    -o-animation: bubblingG 1.3s infinite alternate;
    border-radius: 94px;
    animation: bubblingG 1.3s infinite alternate;
}

#bubblingG_1 {
    -moz-animation-delay: 0s;
    -webkit-animation-delay: 0s;
    -ms-animation-delay: 0s;
    -o-animation-delay: 0s;
    animation-delay: 0s;
}

#bubblingG_2 {
    -moz-animation-delay: 0.39s;
    -webkit-animation-delay: 0.39s;
    -ms-animation-delay: 0.39s;
    -o-animation-delay: 0.39s;
    animation-delay: 0.39s;
}

#bubblingG_3 {
    -moz-animation-delay: 0.78s;
    -webkit-animation-delay: 0.78s;
    -ms-animation-delay: 0.78s;
    -o-animation-delay: 0.78s;
    animation-delay: 0.78s;
}

@-moz-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -moz-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -moz-transform: translateY(-39px);
    }
}

@-webkit-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -webkit-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -webkit-transform: translateY(-39px);
    }
}

@-ms-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -ms-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -ms-transform: translateY(-39px);
    }
}

@-o-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -o-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -o-transform: translateY(-39px);
    }
}

@keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    transform: translateY(-39px);
    }
}

.shadow{
    box-shadow:inset 0px 0px 85px rgba(0,0,0,1);
    -webkit-box-shadow:inset 0px 0px 85px rgba(0,0,0,1);
    -moz-box-shadow:inset 0px 0px 85px rgba(0,0,0,1);
}
img.shadow_photo {
    z-index: -1;
    position: relative;
}

</style>

<div id="divLoading">
    <center>
    <div class="bubblingG" style="top: 30%;position: absolute;left: 45%;" >
        <span id="bubblingG_1"></span>
        <span id="bubblingG_2"></span>
        <span id="bubblingG_3"></span>
    </div>
    </center>
</div>