import { defaults } from 'lodash'
import axios from 'axios'
import { baseURL } from  'src/config'

console.log(baseURL);

export const createClient = (options = {}) => axios.create(defaults({
	baseURL: baseURL
}, options))

export default createClient()
