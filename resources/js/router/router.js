import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from '../components/HomeComponent.vue'

import KategoriComponent from '../components/kategori/KategoriComponent.vue'
import TambahKategoriComponent from '../components/kategori/TambahComponent.vue'
import EditKategoriComponent from '../components/kategori/EditComponent.vue'

import TiketComponent from '../components/tiket/TiketComponent.vue'
import TambahTiketComponent from '../components/tiket/TambahComponent.vue'
import EditTiketComponent from '../components/tiket/EditComponent.vue'

import TransaksiComponent from '../components/transaksi/TransaksiComponent.vue'

const routes = [

{ name: 'home', path: '/', component: HomeComponent },
{ name: 'home', path: '/home', component: HomeComponent },

//Kategori
{ name:'kategori', path:'/kategori', component:KategoriComponent },
{ name:'tambahkategori', path:'/kategori/tambah', component:TambahKategoriComponent },
{ name:'editkategori', path:'/kategori/edit/:id', component: EditKategoriComponent },

//Tiket
{ name:'tiket', path:'/tiket', component:TiketComponent },
{ name:'tambahTiket', path:'/tiket/tambah', component:TambahTiketComponent },
{ name:'editTiket', path:'/tiket/edit/:id', component:EditTiketComponent },

//Transaksi
{ name:'transaksi', path:'/transaksi', component:TransaksiComponent }

]

Vue.use(VueRouter)
const router = new VueRouter({
	routes,
	hasbang : false,
	mode : 'history'
})

export default router