<?php
namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\HTTP\ResponseInterface;

class CalendarController extends BaseController
{
    public function index()
    {
        return view('calendar');
    }

    // Mendapatkan semua event
    public function fetchEvents()
    {
        $eventModel = new EventModel();
        $events = $eventModel->findAll();

        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id' => $event['id'],
                'title' => $event['title'],
                'start' => $event['start'],
                'end' => $event['end'],
                'description' => $event['description'],
                'allDay' => (bool)$event['allDay']
            ];
        }

        return $this->response->setJSON($data);
    }

    // Menambahkan event baru
    public function addEvent()
    {
        $eventModel = new EventModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'start' => $this->request->getPost('start'),
            'end' => $this->request->getPost('end'),
            'description' => $this->request->getPost('description'),
            'allDay' => $this->request->getPost('allDay') === 'true' ? 1 : 0
        ];

        $eventModel->save($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Memperbarui event
    public function updateEvent()
    {
        $eventModel = new EventModel();
    
        $id = $this->request->getPost('id');
        $data = [
            'title' => $this->request->getPost('title'),
            'start' => $this->request->getPost('start'), // Waktu start sudah dalam format ISO
            'end' => $this->request->getPost('end'),     // Waktu end dalam format ISO
            'allDay' => $this->request->getPost('allDay') === 'true' ? 1 : 0
        ];
    
        $eventModel->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }    

    // Menghapus event
    public function deleteEvent()
    {
        $eventModel = new EventModel();

        $id = $this->request->getPost('id');
        $eventModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}
