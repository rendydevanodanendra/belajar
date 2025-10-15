<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

// GANTI DENGAN IP LXC BACKEND NANTI SAAT DEPLOY
const apiUrl = 'http://localhost:3000/api/tasks';

const tasks = ref([]);
const newTaskTitle = ref('');

// Fungsi untuk mengambil semua data tugas dari API
const fetchTasks = async () => {
  try {
    const response = await axios.get(apiUrl);
    tasks.value = response.data;
  } catch (error) {
    console.error("Gagal mengambil data:", error);
  }
};

// Fungsi untuk menambah tugas baru
const addTask = async () => {
  if (newTaskTitle.value.trim() === '') return;
  try {
    const response = await axios.post(apiUrl, { title: newTaskTitle.value });
    tasks.value.push(response.data);
    newTaskTitle.value = ''; // Kosongkan input field
  } catch (error) {
    console.error("Gagal menambah tugas:", error);
  }
};

// Fungsi untuk menghapus tugas
const deleteTask = async (taskId) => {
  try {
    await axios.delete(`${apiUrl}/${taskId}`);
    // Filter array untuk menghapus task yang sudah dihapus di server
    tasks.value = tasks.value.filter(task => task.id !== taskId);
  } catch (error) {
    console.error("Gagal menghapus tugas:", error);
  }
};

// Ambil data saat komponen pertama kali dimuat
onMounted(fetchTasks);
</script>

<template>
  <div class="app-container">
    <h1>📝 Daftar Tugas</h1>
    <div class="input-container">
      <input
        v-model="newTaskTitle"
        @keyup.enter="addTask"
        placeholder="Ketik tugas baru..."
      />
      <button @click="addTask">Tambah</button>
    </div>
    <ul>
      <li v-for="task in tasks" :key="task.id">
        <span>{{ task.title }}</span>
        <button class="delete-btn" @click="deleteTask(task.id)">Hapus</button>
      </li>
    </ul>
  </div>
</template>

<style>
  /* Import Google Font */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

  /* Reset dan Tampilan Dasar Body */
  body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }

  /* Kontainer Utama Aplikasi */
  .app-container {
    width: 100%;
    max-width: 550px;
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.18);
  }

  /* Judul Aplikasi */
  h1 {
    text-align: center;
    color: #3f3d56;
    margin-bottom: 25px;
    font-weight: 600;
  }

  /* Kontainer untuk Input dan Tombol Tambah */
  .input-container {
    display: flex;
    gap: 10px;
    margin-bottom: 25px;
  }

  /* Input Field */
  input {
    flex-grow: 1;
    padding: 12px 15px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
  }
  input:focus {
    outline: none;
    border-color: #667eea;
  }

  /* Tombol Umum */
  button {
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  button:hover {
    transform: translateY(-2px);
  }

  /* Tombol Tambah */
  .input-container button {
     background-color: #5a67d8;
  }
   .input-container button:hover {
     background-color: #4c58b8;
  }


  /* Daftar Tugas (UL) */
  ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  /* Setiap Item Tugas (LI) */
  li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  }

  /* Teks Tugas */
  li span {
    font-size: 16px;
  }

  /* Tombol Hapus */
  .delete-btn {
    background-color: #e53e3e;
    opacity: 0.8;
  }
  .delete-btn:hover {
    background-color: #c53030;
    opacity: 1;
  }
</style>