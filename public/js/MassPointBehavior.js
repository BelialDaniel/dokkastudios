var counter = 0;
var updateRate = 5;

var container = null;
var surface = null;

window.onload = function() {
    findMassPointsAnimations(document.getElementsByClassName('container-mass-point'));
}

var findMassPointsAnimations = function(massPointContainers) {
    if(massPointContainers != null && massPointContainers.length >= 1) {
        
        Array.prototype.forEach.call(massPointContainers, massPointContainer => {
            var massPointSurfaces = massPointContainer.getElementsByClassName('surface-mass-point');
            if(massPointSurfaces != null && massPointSurfaces.length >= 1) {
                massPointAnimation(massPointContainer, massPointSurfaces[0]);
            }
        });
    }
}

var massPointAnimation = function(massPointContainer, massPointSurface) {
    container = massPointContainer;
    surface = massPointSurface;

    container.onmouseleave  = onMouseLeaveHandler;
    container.onmouseenter  = onMouseEnterHandler;
    container.onmousemove   = onMouseMoveHandler;
    mouse.setOrigin(container);
}

var mouse = {
    dx: 0,
    dy: 0,
    x: 0,
    y: 0,
    updatePosition: function (event) {
        var e  = event || window.event;
        this.x = e.clientX - this.dx;
        this.y = (e.clientY - this.dy) * -1;
    },
    setOrigin: function (e) {
        this.dx = e.offsetLeft + Math.floor(e.offsetWidth  / 2);
        this.dy = e.offsetTop  + Math.floor(e.offsetHeight / 2);
    },
    show: function () {
        return "(" + this.x + ", " + this.y + ")";
    }
}

var updateOnMouseMove = function () {
    return counter++ % updateRate === 0;
}

var onMouseEnterHandler = function (event) {
    update(event);
}

var onMouseLeaveHandler = function () {
    surface.style = "";
}

var onMouseMoveHandler = function (event) {
    if (updateOnMouseMove()) {
        update(event);
    }
}

var update = function (event) {
    mouse.updatePosition(event);
    updateTransformStyle(
        (mouse.y / surface.offsetHeight / 2).toFixed(2),
        (mouse.x / surface.offsetWidth / 2).toFixed(2)
    );
}

var updateTransformStyle = function (x, y) {
    var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
    surface.style.transform = style;
    surface.style.oTransform = style;
    surface.style.msTransform = style;
    surface.style.mozTransform = style;
    surface.style.webkitTransform = style;
}