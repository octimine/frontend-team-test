<template>
	<div class="container">
        <header class="page-header">
            <h4>New Book</h4>
        </header>
		
		<div class="row">
			<div class="form-group col-md-6">
			 	<label class="control-label">Title</label>
			 	<input class="form-control" v-model="book.title" >
			</div>
			
			<div class="form-group col-md-6">
			 	<label class="control-label">Author</label>
			 	<input class="form-control" v-model="book.author" >
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-2">
			 	<label class="control-label">Edition</label>
			 	<input class="form-control" v-model="book.edition" >
			</div>
			
			<div class="form-group col-md-2">
			 	<label class="control-label">Year</label>
			 	<input class="form-control" v-model="book.year" >
			</div>
			
			<div class="form-group col-md-2">
			 	<label class="control-label">Genre</label>
			 	<input class="form-control" v-model="book.genre" >
			</div>
			
			<div class="form-group col-md-6">
			 	<label class="control-label">Company</label>
			 	<input class="form-control" v-model="book.company" >
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-12">
			 	<label class="control-label">Synopsis</label>
			 	<textarea rows="4" class="form-control" v-model="book.synopsis" ></textarea>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="alert alert-success" :class="{ 'alert-success': success, 'alert-danger': error }" role="alert" v-if="message">{{message}}</div>
			<div class="col-md-12 footer">

				<router-link to="">
					<a href="#" class="btn btn-success" @click="save()">Save</a>
				</router-link>

				<router-link to="/">
					<a href="#" class="btn btn-danger">Exit</a>
				</router-link>
			</div>
		</div>

	</div>
</template>

<script>
	import http from 'src/http'

	export default {
		data () {
			return {
				book: { id: 0, title: '', author: '', edition: '', year: '', genre: '', company: '', synopsis: ''} ,

				message: '',
				success: '',
				error: ''
			}
		},
		
		mounted () {
			const id =  this.$route.params.id;
			if (id != 0) {
		  		http.get('books/' + this.$route.params.id )
		  		.then(response => response.data)
	           	.then(data => {
	           		this.book = data.data
	       		 })
			}
		},

		methods: {
			save () {
				const self = this
				http.post('books', this.book)
				.then(response => response.data)
				.then(data => {
					self.success = true
					self.message = "Livro removido com sucesso"
					self.hideAlert()
				})
				.catch(function (error) {
    				selfs.error = true
    				self.message = 'Não foi possíve remover o livro'
					self.hideAlert()
  				});
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
	.footer {
		text-align: right;
	}
</style>