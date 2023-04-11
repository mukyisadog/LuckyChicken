
                        bt = document.getElementById("searchbt")
                        bt.onclick = function () {
                            // event.preventDefault();
                            const titles = Array.from(document.querySelectorAll(".searchtitle")).map(title => title.textContent);
                            // console.log(titles);
                            const searchinput = document.getElementById("search-input");
                            const articles = Array.from(document.querySelectorAll(".article"));

                            let reg1 = /\w/g
                            let reg2 = /[\u4E00-\u9FFF]/g
                            if (reg1.test(searchinput.value.trim()) == true || reg2.test(searchinput.value.trim()) == true) {
                                if (searchinput.value.trim() == "") {
                                    alert("請輸入關鍵字");
                                    articles.forEach(article => article.classList.remove("unmatched"));
                                }
                                else {
                                    b = new RegExp(`${searchinput.value.trim()}`, 'gi')
                                    // console.log(b)
                                    let arr = []
                                    for (let i = 0; i < titles.length; i++) {
                                        result = titles[i].matchAll(b)
                                        if (Array.from(result).length > 0) {
                                            arr.push(titles[i]);
                                            articles[i].classList.remove("unmatched");
                                        }else{
                                            articles[i].classList.add("unmatched");    
                                        }
                                    }
                                    if (arr == "") {
                                        alert("找不到相關內容");
                                        articles.forEach(article => article.classList.remove("unmatched"));
                                        // console.log('123');
                                    } 
                                    else { 
                                        
                                    }
                                }
                            }else{
                                alert("請輸入關鍵字");
                                articles.forEach(article => article.classList.remove("unmatched"));
                            }
                            
                        }
            