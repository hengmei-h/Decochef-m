<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .poCard {
          width: 300px;
          margin-right: 20px;
          background-color: #ffffff;
          box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
        }
        .poimgs {
          height: 200px;
          background-color: #f1f1f1;
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .potext {
          padding: 20px;
        }
        .pm {
          font-size: 14px;
          color: #6d6d6d;
          line-height: 1.5;
          margin-top: 10px;
        }
        h6 {
          font-size: 16px;
          color: #333333;
          margin-bottom: 5px;
        }
        /* 滾動條樣式 */
        ::-webkit-scrollbar {
          height: 10px;
        }
        ::-webkit-scrollbar-thumb {
          background-color: #cccccc;
          border-radius: 10px;
        }
        ::-webkit-scrollbar-track {
          background-color: #f1f1f1;
          border-radius: 10px;
        }
      </style>
</head>
<body>
    <div style="display: flex; overflow-x: scroll;">
        <div class="poCard">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="">
          </div>
          <div class="potext">
            <h6>No.1</h6>
            <div class="pm"> 
              免費課程體驗 免費課程體驗
            </div>
          </div>
        </div>
        <div class="poCard">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="">
          </div>
          <div class="potext">
            <h6>No.2</h6>
            <div class="pm"> 
              免費課程體驗 免費課程體驗
            </div>
          </div>
        </div>
        <div class="poCard">
          <div class="poimgs">
            <img src="imgs/class1/pocard.png" alt="">
          </div>
          <div class="potext">
            <h6>No.3</h6>
            <div class="pm"> 
              免費課程體驗 免費課程體驗
            </div>
          </div>
        </div>
      </div>
      
    
      
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script>
        const container = document.querySelector('div[style="display: flex; overflow-x: scroll;"]');
        let scrollPosition = 0;
        const scroll = function() {
          scrollPosition++;
          if (scrollPosition > container.scrollWidth - container.clientWidth) {
            scrollPosition = 0;
          }
          container.scrollTo(scrollPosition, 0);
          setTimeout(scroll, 10);
        };
        setTimeout(scroll, 10);
    </script>
      
</body>
</html>