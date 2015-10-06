
$(document).ready(function(){
	var gSearchQuery="";
	/*Initial request - gets current user from app and displays the name */
	$.ajax({
		url: "/recipes/list",
		type: "POST",
		data: {_token: $('#main').attr('data-user')}	
		/*here is the data sent to chat server*/
	})
	.done(function(data){
		obj=jQuery.parseJSON(data);
		//$("#main").html('<h4>Hello, '+obj['currentUser']['name']+'!</h4>');
		var recipes=obj;
		/* Load recipes into the oven */
		var recipesHtml='';
			jQuery.each(recipes,function(index,value){
				recipesHtml=recipesHtml+
						'<div class="col-md-4 col-sm-6">'+
                            '<div title="Cooking time:'+value['cooking_time']+'minutes" class="service-item">'+
                                '<span class="fa-stack fa-4x">'+
                                '<i class="fa fa-circle fa-stack-2x"></i>'+
                                '<i class="fa fa-cutlery fa-stack-1x text-primary"></i></span>'+
                                '<h4><strong>'+value['name']+'</strong></h4>'+
                                '<p>'+value['ingredients'][0]['name']+'</p>'+
                                '<p>'+value['ingredients'][1]['name']+'</p>'+
                                '<p>'+value['ingredients'][2]['name']+'</p>'+
                                '<a href="/recipes/'+value['id']+'" class="btn btn-light" data>View Details</a>'+
                            '</div>'+
                        '</div>';
			});
		$("#recipe-list").html(recipesHtml);
	});
	
	$('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
	
	
	/*                     ######                  FILTERING   */
	
	var filterRecipes=function(sMode,gSearchQuery,requestPage){
		//requested page
		if(requestPage===undefined){	requestPage=1;	}
		
		$.ajax({
			url: "recipes/list",
			type: "POST",
			data: {_token: $('#main').attr('data-user'),
			       searchRecipes: sMode,
			       searchQuery: gSearchQuery, 
			       page: requestPage}	//everyone is Joe for until I get the login feature done...
		
		})
		.done(function(data){
			obj=jQuery.parseJSON(data);
			
			var recipes=obj['recipes'];
			
			//#####################################################PAGINATION######################
			//Pagination starts here. I created an object that holds all necessary info for the pagination function which returns the html
			//var numberOfPages=Math.ceil(obj.recipeCount[0] / 10);
			var numberOfPages=Math.ceil(obj.recipeCount[0] / 10);
			//pagination object; will eventually have a function to return html
			var pagination={
				numPages: numberOfPages, 
				html: "",
				page: requestPage, 
				start: ( ( requestPage - 9 ) > 0 ) ? requestPage - 9 : 1, 
				end: ( ( requestPage + 9 ) < numberOfPages ) ? requestPage + 9 : numberOfPages,
				sethtml: function(){
					//keep your strings clean
					this.html="";
					this.html=	'<nav id="filtered-recipes-pagination">'+
								'      <ul class="pagination"><li ';
					//first page
					if(this.page==1) { this.html += ' class=active ';}
					this.html += ' ><button>First <span class="sr-only">(current)</span></button> ';
					//mid section
					i=this.start;
					do{
						this.html+='<li ';
						//current page
						if(this.page==i){
							this.html+= ' class="active" ';
						}
						current=(this.page==i) ? '(current)':'';
						this.html+= '><button>'+i +'<span class="sr-only">'+ current + '</span></button></li>';
						i++;
					}
					while(i<=this.end);
					//last page
					this.html+='<li';
					if(this.page==this.numPages) { this.html += ' class="active" ';}
					this.html+='><button>Last</button></li></ul></nav>';
					return this.html;
					
				}
			};
			
			
			
			if(recipes.length<1){
				html='<h4><strong>Sorry, we currently have no recipes for you.</strong></h4>';
				$("#searchResults").html(html);
				return;
			}
			else {
				
			}
//filteredRecipes
			var html='<div class="filtered-recipes" data-example-id="panel-without-body-with-table">'+
'    <div class="panel panel-default">'+
'      <!-- Default panel contents -->'+
'      <div class="panel-heading">Found recipes</div>'+
'      <!-- Table -->'+
'      <table class="table">'+
'        <thead>'+
'          <tr>'+
'            <th>Recipe</th>'+
'            <th>Cooking time</th>'+
'            <th>Main ingredients</th>'+
'          </tr>'+
'        </thead>'+
'        <tbody>';
//actual recipes
			jQuery.each(recipes,function(index,value){
				html=html+
				'          <tr>'+
'            <td><a href="/recipes/'+value['id']+'">'+value['name']+'</a></td>'+
'            <td>'+value['cooking_time']+'</td>'+
'            <td>'+value['ingredients'][0]['name']+', '+value['ingredients'][1]['name']+', '+value['ingredients'][2]['name']+'</td>'+
'          </tr>';
			})
//close tags
			html=html+
'          </tr>'+
'        </tbody>'+
'      </table>'+
'    </div>'+pagination.sethtml()+
'  </div>';
	$("#searchResults").html(html);
		})
	};
	
	
	//#######################################search function
	$( "#search_query" ).keydown(function( event ) { /* to work on pressing the enter key*/
		if ( event.which == 13 ) {
		event.preventDefault();
		if($("#search_query").val().length<2) return; //no search less than 3 characters
		gSearchQuery=$("#search_query").val();
		filterRecipes($("#search_param").val(),gSearchQuery);
		}
	});
	$(".input-group-btn").click(function(){
		if($("#search_query").val().length<2) return; //no search less than 3 characters
		gSearchQuery=$("#search_query").val();
		filterRecipes($("#search_param").val(),gSearchQuery);
		
	});
	
	
	
	//star recipes
	$("#toggle-star").mouseover(function(){
		if ($("#star-icon").hasClass("fa-star")){
			$("#star-icon").removeClass("fa-star");
			$("#star-icon").addClass("fa-star-o");
		}
		else {
			$("#star-icon").removeClass("fa-star-o");
			$("#star-icon").addClass("fa-star");
		}
	});
	$("#toggle-star").mouseout(function(){
		if ($("#star-icon").hasClass("fa-star")){
			$("#star-icon").removeClass("fa-star");
			$("#star-icon").addClass("fa-star-o");
		}
		else {
			$("#star-icon").removeClass("fa-star-o");
			$("#star-icon").addClass("fa-star");
		}
	});

	$("#toggle-star").click(function(e){
		e.preventDefault();
		$.ajax({
			url: "/recipes/list",
			type: "POST",
			data: {action: 'starrecipe', userid: $("#main").attr("data-user"), recipeid: $("#main").attr("data-recipe")}	
		/*here is the data sent to chat server*/
		})
		.done(function(data){
			obj=jQuery.parseJSON(data);
			
			var recipes=obj['starredRecipes'];
			if(recipes.length<1){
				html="<p><strong>Sorry, you don't currently have any starred recipes, get started by starring recipes you like</strong></p>";
				$("#starred-recipes").html(html);
				return;
			}
//filteredRecipes
			var html='    <div class="panel panel-default">'+
'      <!-- Default panel contents -->'+
'      <div class="panel-heading">Found recipes</div>'+
'      <!-- Table -->'+
'      <table class="table">'+
'        <thead>'+
'          <tr>'+
'            <th>Recipe</th>'+
'            <th>Cooking time</th>'+
'          </tr>'+
'        </thead>'+
'        <tbody>';
//actual recipes
			jQuery.each(recipes,function(index,value){
				html=html+
				'          <tr>'+
'            <td><a href="recipe.php?id='+value['id']+'">'+value['name']+'</a></td>'+
'            <td>'+value['cooking']+'</td>'+
'          </tr>';
			})
//close tags
			html=html+
'          </tr>'+
'        </tbody>'+
'      </table>'+
'    </div>';
	$("#starred-recipes").html(html);
	setTimeout(function(){document.location.reload();},200);
		});
	})
	
	//####################################request pages of filtered recipes
	//        I had to bind it on the fly because the elements are not a part of the DOM at the execution time. 
	$( document ).on("click", ".pagination li button",function(e){
		e.preventDefault;
		filterRecipes($("#search_param").val(),gSearchQuery,$(e.target).text());
	});
});




 
