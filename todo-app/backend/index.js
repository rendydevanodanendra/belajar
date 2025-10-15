// index.js (Backend)

const express = require('express');
const cors = require('cors');
const app = express();
const port = 3000;

// Middleware untuk mengizinkan request body dalam format JSON dan CORS
app.use(cors());
app.use(express.json());

// "Database" sederhana kita menggunakan array
let tasks = [
    { id: 1, title: 'Belajar Proxmox', completed: false },
    { id: 2, title: 'SISTER JOSJIS', completed: true },
    { id: 3, title: 'Deploy ke LXC', completed: false }
];
let nextId = 4;

// === Rute API ===

// GET /api/tasks -> Mengambil semua tugas
app.get('/api/tasks', (req, res) => {
    res.json(tasks);
});

// POST /api/tasks -> Membuat tugas baru
app.post('/api/tasks', (req, res) => {
    const newTask = {
        id: nextId++,
        title: req.body.title,
        completed: false
    };
    tasks.push(newTask);
    res.status(201).json(newTask);
});

// DELETE /api/tasks/:id -> Menghapus tugas
app.delete('/api/tasks/:id', (req, res) => {
    const taskId = parseInt(req.params.id);
    tasks = tasks.filter(task => task.id !== taskId);
    // Memberi respons 'No Content' yang artinya sukses tapi tidak ada data untuk dikembalikan
    res.status(204).send();
});


app.listen(port, () => {
    console.log(`Server API berjalan di http://localhost:${port}`);
});