<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Post;
use OpenApi\Annotations as OA;


/**
 * @OA\Info(title="CRUD API Post Social Media", version="0.1"),
 */
class PostController extends ResourceController
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    /**
     * @OA\Get(
     *     path="/api/post",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function index()
    {
        $data = $this->post->findAll();

        return $this->respond([
            'status' => 'success',
            'message' => 'semua data berhasil terambil',
            'data' => $data
        ], 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */

    /**
     * @OA\Get(
     *     path="/api/post/{id}",
     *       @OA\Parameter(
     *          name = "id",
     *          in = "path",
     *          required = true,
     *       ),
     *     @OA\Response(response="200", description="Succes get data with id"),
     *     @OA\Response(response="400", description="Failed get data with id")
     * )
     */
    public function show($id = null)
    {
        $data = $this->post->find($id);

        if (empty($data)) {
            return $this->fail([
                'error' => 'Id tidak ditemukan'
            ], 400);
        } else {
            return $this->respond([
                'status' => 'success',
                'message' => 'data berhasil terambil berdasarkan id',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */

    /**
     * @OA\Post(
     *     path="/api/post",
     *     @OA\Response(
     *         response=200,
     *         description="success insert data",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="failed insert data",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(
     *                    property = "username",
     *                    type = "string"
     *                 ),
     *                 @OA\Property(
     *                    property = "author",
     *                    type = "string"
     *                 ),
     *                 @OA\Property(
     *                    property = "caption",
     *                    type = "text"
     *                 ),
     *                 @OA\Property(
     *                    property = "platform",
     *                    type = "string"
     *                 ),
     *                 @OA\Property(
     *                    property = "likes",
     *                    type = "integer"
     *                 ),
     *                 @OA\Property(
     *                    property = "dislikes",
     *                    type = "integer"
     *                 ),
     *                 @OA\Property(
     *                    property = "comments",
     *                    type = "integer"
     *                 ),
     *             )
     *         )
     *     )
     * )
     */
    public function create()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'author' => $this->request->getPost('author'),
            'caption' => $this->request->getPost('caption'),
            'platform' => $this->request->getPost('platform'),
            'likes' => $this->request->getPost('likes'),
            'dislikes' => $this->request->getPost('dislikes'),
            'comments' => $this->request->getPost('comments'),
        ];

        if (!$this->post->insert($data)) {
            return $this->fail([
                'error' => 'data gagal ditambahkan'
            ], 400);
        } else {
            return $this->respondCreated([
                'status' => 'success',
                'message' => 'data berhasil ditambahkan'
            ]);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */

    /**
     * @OA\Put(
     *     path="/api/post/{id}",
     *     @OA\Response(
     *         response=200,
     *         description="success update data",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="failed update data",
     *     ),
     *     @OA\Parameter(
     *          name = "id",
     *          in = "path",
     *          required = true,
     *       ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(
     *                    property = "username",
     *                    type = "string"
     *                 ),
     *                 @OA\Property(
     *                    property = "author",
     *                    type = "string"
     *                 ),
     *                 @OA\Property(
     *                    property = "caption",
     *                    type = "text"
     *                 ),
     *                 @OA\Property(
     *                    property = "platform",
     *                    type = "string"
     *                 ),
     *                 @OA\Property(
     *                    property = "likes",
     *                    type = "integer"
     *                 ),
     *                 @OA\Property(
     *                    property = "dislikes",
     *                    type = "integer"
     *                 ),
     *                 @OA\Property(
     *                    property = "comments",
     *                    type = "integer"
     *                 ),
     *             )
     *         )
     *     )
     * )
     */
    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        if (!$this->post->update($id, $data)) {
            return $this->fail([
                'error' => 'Data gagal untuk diupdate'
            ], 400);
        } else {
            return $this->respond([
                'status' => 'success',
                'message' => 'Data berhasil diupdate'
            ], 200);
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */

    /**
     * @OA\Delete(
     *     path="/api/post/{id}",
     *       @OA\Parameter(
     *          name = "id",
     *          in = "path",
     *          required = true,
     *       ),
     *     @OA\Response(response="200", description="Succes get data with id"),
     *     @OA\Response(response="400", description="Failed get data with id")
     * )
     */
    public function delete($id = null)
    {
        $data = $this->post->find($id);

        if (empty($data)) {
            return $this->fail([
                "error" => "id tidak ditemukan"
            ]);
        } else {
            $this->post->delete($id);
            return $this->respondDeleted([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        }
    }
}
