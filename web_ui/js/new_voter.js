$('#all').blurjs( {
					overlay: 'rgba(255,255,255,0.8)',
					radius: 10
				} );
				
				function changein(n) {
					var myele = document.querySelector("#floatline");
					myele.style.top = n+"px";
				}
				
				function changeout() {
					var myele = document.querySelector("#floatline");
					myele.style.top = "90px";
				}
				
				function nav(id) {
					window.location.href = id;
				}
			
				function tempo() {
					alert("cheching....");
				}