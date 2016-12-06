import MfBooks from '../components/books.vue'
import MfEditBook from '../components/edit-book.vue'

export default [
    { path: '/', component: MfBooks },
    { path: '/edition/:id', component: MfEditBook }
]
