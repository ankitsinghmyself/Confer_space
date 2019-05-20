particlesJS('particles-js',

 {
  "particles":{
    "number":{
      "value":50
    },
    "color":{
      "value":"#fff"
    },
    "shape":{
      "type":"circle",
      "stroke":{
        "width":1,
        "color":"#ccc"
      }
      
    },
    "opacity":{
      "value":0.5,
      "random":true,
      "anim":{
        "enable":false,
        "speed":1
      }
    },
    "size":{
      //size
      "value": 1,
      "random":false,
      "anim":{
        "enable": false,
        "speed":30
      }
    },
    "line_linked":{
      "enable": true,
      "distance": 120,
      "color":"#fff",
      "width":1
    },
    "move":{
      "enable":true,
      "speed":2,
      "direction":"none",
      "straight":false
    }
  },
  "interactivity":{
    "events":{
      "onhover":{
        "enable":true,
        "mode":"grab"
      },
      "onclick":{
        "enable": true,
        "mode":"push"
      }
    },
    "modes":{
      "repulse":{
        "distance":50,
        "duration":0.4
      },
      "bubble":{
        "distance":200,
        "size":1
      }
    }
  }
}


);