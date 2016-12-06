<template>
    <div class="container">
        <header class="page-header">
            <h4>My Books</h4>
        </header>
		
		<div class="row">
			<div class="col-md-12">
				<router-link to="/edition/0">
					<a class="btn btn-primary">Add Book</a>
				</router-link> 	
			</div>
		</div>
		<br><br>
		<div class="alert alert-success" :class="{ 'alert-success': success, 'alert-danger': error }" role="alert" v-if="message">{{message}}</div>
		<div class="rw">
	        <table class="table table-hover">
	        	<thead>
	        		<tr>
	        			<th width="30%">Title</th>
	        			<th width="30%">Author</th>
	        			<th width="35%">Synopsis</th>
	        			<th width="5%">Actions</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr v-for="book in listBooks">
	        			<td>{{ book.title }}</td>
	        			<td>{{ book.author }}</td>
	        			<td>{{ book.synopsis }}</td>

	        			<td>
							<router-link v-bind:to="{ path: '/edition/' + book.id }">
								<a title="Edit" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
							</router-link> 	&nbsp &nbsp
	        				<a title="Remove" href="#" v-on:click="confirmRemove( book.id )"><i class="fa fa-trash" aria-hidden="true"></i></a>
	        			</td>
	        		</tr>

	        	</tbody>
	        </table>
		</div>

		<div class="row">
			<div class="col-md-12" style="text-align: center">
				
	        <ul class="pagination">
	        	<li><a href="#" @click="getList(1)" v-if="pageActive > 1">&laquo;</a></li>
	        	<li><a href="#" v-for="page in lastPage" @click="getList(page)">{{page}}</a></li>
	        	<li><a href="#" @click="getList(lastPage)" v-if="pageActive < lastPage">&raquo;</a></li>
	        </ul>
			</div>
		</div>

		<div class="modal fade" id="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Remove book</h4>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" @click="closeRemove()">No</button>
						<button type="button" class="btn btn-primary" @click="removeBook()">Yes</button>
					</div>
				</div>
			</div>
		</div>		
    </div>
</template>

<script>
	import http from 'src/http'
	
	export default {
		data () {
			return {
				listBooks: [],
				idRemove: '',
				message: '',
				success: '',
				error: '',

				lastPage: '',
				pageActive: 1

			}
		},

		mounted () {
			this.getList(this.page)
      	},

		methods: {
			getList (page) {
				this.pageActive = page;
		  		http.get('books', {params: {page: page}})
			  		.then(response => response.data)
		           	.then(data => {
		           		this.listBooks = data.data
		           		this.lastPage = data.last_page;
		       		 })
		    },

			confirmRemove (id) {
				this.idRemove = id;
				$('#modal').modal('toggle')
			},

			removeBook () {
				$('#modal').modal('toggle')

				const self = this
		  		http.delete('books/' + this.idRemove)
			  		.then(response => response.data)
		           	.then(data => {
						self.success = true
						self.message = "Livro removido com sucesso"
						self.idRemove = ''
						self.hideAlert()
						self.getList(pageActive)
		       		})
					.catch(function (error) {
	    				self.error = true
	    				self.message = 'Não foi possíve remover o livro'
	    				self.hideAlert()
	  				});
		    },

		    closeRemove () {
		    	this.idRemove = ''
		    },

		    hideAlert () {
		    	setTimeout(() => {
		    		this.message = ''
		    		this.success = ''
		    		this.error 	 = ''

		    	}, 3000)
		    }
		}
	}
</script>

<style>
	a {
		color:  gray;
	}

	.show-modal {
		display: block !important;
	}

</style>