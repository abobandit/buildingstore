<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function show($id)
    {
        $calculator = Calculator::findOrFail($id);
        return response()->json($calculator);
    }

    // Создать новый калькулятор
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fields' => 'required|array',
        ]);

        $calculator = Calculator::create($data);

        return response()->json($calculator, 201);
    }

    // Обновить калькулятор
    public function update(Request $request, $id)
    {
        $calculator = Calculator::findOrFail($id);

        $data = $request->validate([
            'type' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'fields' => 'sometimes|required|array',
        ]);

        $calculator->update($data);

        return response()->json($calculator);
    }

    // Удалить калькулятор
    public function destroy($id)
    {
        $calculator = Calculator::findOrFail($id);
        $calculator->delete();

        return response()->json(['message' => 'Калькулятор удален']);
    }
    public function calculatePaint(Request $request)
    {

        $data = $request->validate([
            'parameters' => 'required|array',
        ]);

        $parameters = $data['parameters'];

        $result = null;

        // Калькулятор для покраски стен
        $height = $parameters['height'] ?? 0;
        $width = $parameters['width'] ?? 0;
        $consumption = $parameters['consumption'] ?? 0.1; // л/м² по умолчанию

        $area = $height * $width;
        $paintNeeded = $area * $consumption;

        $result = [
            'area' => round($area, 2), // Площадь стены
            'paint_needed' => round($paintNeeded, 2), // Сколько литров краски нужно
        ];

        return response()->json([
            'result' => $result,
        ]);
    }
    public function calculateTile(Request $request)
    {

        $data = $request->validate([
            'parameters' => 'required|array',
        ]);

        $parameters = $data['parameters'];

        $result = null;

        $floorWidth = $parameters['floor_width'] ?? 0;
        $floorLength = $parameters['floor_length'] ?? 0;
        $tileWidth = $parameters['tile_width'] ?? 0.3;
        $tileLength = $parameters['tile_length'] ?? 0.3;

        $floorArea = $floorWidth * $floorLength;
        $tileArea = $tileWidth * $tileLength;
        $tilesNeeded = ceil($floorArea / $tileArea * 1.05); // +5% запас

        $result = [
            'floor_area' => round($floorArea, 2),
            'tiles_needed' => (int) $tilesNeeded,
        ];

        return response()->json([
            'result' => $result,
        ]);
    }

}
