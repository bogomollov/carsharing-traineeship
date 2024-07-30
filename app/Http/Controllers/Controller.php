<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5Swagger",
 *      description="Implementation of Swagger with in Laravel",
 *      @OA\Contact(
 *          email="admin@admin.com"         
 *      ), 
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * 
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Local"
 * )
 * 
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST2,
 *      description="Production"
 * )
 * 
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearerAuth",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * ),
 * @OA\Schema(
 *  schema="ArendatorAll",
 *  title="ArendatorAll",
 *   @OA\Property(property="data", type="array",
 *       @OA\Items(
 *          @OA\Property(property="id", type="uuid", example="af42801a-70bb-4966-87d6-d53ead3015b5"),
 *          @OA\Property(property="default_bill_id", type="uuid", example="5z7490a8-f20e-32eb-87f4-3630d5999c0b"),
 *          @OA\Property(property="last_name", type="string", example="Haley"),
 *          @OA\Property(property="first_name", type="string", example="Carolyn"),
 *          @OA\Property(property="middle_name", type="string", example="Berta"),
 *          @OA\Property(property="status", type="string", example="active"),
 *          @OA\Property(property="phone", type="integer", example="7525301782"),
 *       ),
 *   ),
 * ),
 * @OA\Schema(
 *  schema="ArendatorId",
 *  title="ArendatorId",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="af42801a-70bb-4966-87d6-d53ead3015b5"),
 *      @OA\Property(property="default_bill_id", type="uuid", example="5z7490a8-f20e-32eb-87f4-3630d5999c0b"),
 *      @OA\Property(property="last_name", type="string", example="Haley"),
 *      @OA\Property(property="first_name", type="string", example="Carolyn"),
 *      @OA\Property(property="middle_name", type="string", example="Berta"),
 *      @OA\Property(property="status", type="string", example="active"),
 *      @OA\Property(property="phone", type="integer", example="7525301782"),
 *  ),
 * ),
 * @OA\Schema(
 *  schema="ArendatorRequest",
 *  title="ArendatorRequest",
 *      @OA\Property(property="default_bill_id", type="uuid", example="5z7490a8-f20e-32eb-87f4-3630d5999c0b"),
 *      @OA\Property(property="last_name", type="string", example="Haley"),
 *      @OA\Property(property="first_name", type="string", example="Carolyn"),
 *      @OA\Property(property="middle_name", type="string", example="Berta"),
 *      @OA\Property(property="status", type="string", example="active"),
 *      @OA\Property(property="passport_series", type="string", example="52 59"),
 *      @OA\Property(property="passport_number", type="string", example="875660"),
 *      @OA\Property(property="phone", type="integer", example="7525301782"),
 *  ),
 * ),
 * @OA\Schema(
 *  schema="ArendatorChange",
 *  title="ArendatorChange",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="af42801a-70bb-4966-87d6-d53ead3015b5"),
 *      @OA\Property(property="default_bill_id", type="uuid", example="5z7490a8-f20e-32eb-87f4-3630d5999c0b"),
 *      @OA\Property(property="last_name", type="string", example="Haley"),
 *      @OA\Property(property="first_name", type="string", example="Carolyn"),
 *      @OA\Property(property="middle_name", type="string", example="Berta"),
 *      @OA\Property(property="status", type="string", example="active"),
 *      @OA\Property(property="passport_series", type="string", example="52 59"),
 *      @OA\Property(property="passport_number", type="string", example="875660"),
 *      @OA\Property(property="phone", type="integer", example="7525301782"),
 *  ),
 * ),
 * @OA\Schema(
 *  schema="ArendatorDefaultBill",
 *  title="ArendatorDefaultBill",
 *      @OA\Property(property="default_bill_id", type="uuid", example="5z7490a8-f20e-32eb-87f4-3630d5999c0b"),
 * ),
 * @OA\Schema(
 *  schema="ArendatorStatus",
 *  title="ArendatorStatus",
 *      @OA\Property(property="status", type="string", example="frozen"),
 * ),
 * @OA\Schema(
 *  schema="BillAll",
 *  title="BillAll",
 *   @OA\Property(property="data", type="array",
 *       @OA\Items(
 *          @OA\Property(property="id", type="uuid", example="ff7f36b1-1cab-35b9-9b3f-969bb0e92109"),
 *          @OA\Property(property="arendators_count", type="integer", example=1),
 *          @OA\Property(property="type", type="string", example="personal"),
 *          @OA\Property(property="status", type="string", example="open"),
 *       ),
 *   ),
 * ),
 * @OA\Schema(
 *  schema="BillId",
 *  title="BillId",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="ff7f36b1-1cab-35b9-9b3f-969bb0e92109"),
 *      @OA\Property(property="arendators_count", type="integer", example=1),
 *      @OA\Property(property="type", type="string", example="personal"),
 *      @OA\Property(property="status", type="string", example="open"),
 *   ),
 * ),
 * @OA\Schema(
 *  schema="BillRequest",
 *  title="BillRequest",
 *      @OA\Property(property="arendators_count", type="integer", example=1),
 *      @OA\Property(property="balance", type="decimal", example=48658.52),
 *      @OA\Property(property="type", type="string", example="personal"),
 *      @OA\Property(property="status", type="string", example="open"),
 *  ),
 * ),
 * @OA\Schema(
 *  schema="BillChange",
 *  title="BillChange",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="ff7f36b1-1cab-35b9-9b3f-969bb0e92109"),
 *      @OA\Property(property="arendators_count", type="integer", example=1),
 *      @OA\Property(property="balance", type="decimal", example=48658.52),
 *      @OA\Property(property="type", type="string", example="personal"),
 *      @OA\Property(property="status", type="string", example="open"),
 *      ),
 * ),
 * @OA\Schema(
 *  schema="BillStatus",
 *  title="BillStatus",
 *      @OA\Property(property="status", type="string", example="closed"),
 * ),
 * @OA\Schema(
 *  schema="CarAll",
 *  title="CarAll",
 *   @OA\Property(property="data", type="array",
 *       @OA\Items(
 *          @OA\Property(property="id", type="uuid", example="ca327b1a-ed73-41c6-afe0-1eca33866ec3"),
 *          @OA\Property(property="model_id", type="uuid", example="0b4932f2-5c19-4de2-9ddc-17ce2375d164"),
 *          @OA\Property(property="status", type="string", example="rented"),
 *          @OA\Property(property="mileage", type="integer", example=10383),
 *          @OA\Property(property="license_plate", type="string", example="J949YJ 93"),
 *          @OA\Property(property="price_minute", type="integer", example=2),
 *       ),
 *   ),
 * ),
 * @OA\Schema(
 *  schema="CarId",
 *  title="CarId",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="ca327b1a-ed73-41c6-afe0-1eca33866ec3"),
 *      @OA\Property(property="model_id", type="uuid", example="0b4932f2-5c19-4de2-9ddc-17ce2375d164"),
 *      @OA\Property(property="status", type="string", example="rented"),
 *      @OA\Property(property="mileage", type="integer", example=10383),
 *      @OA\Property(property="license_plate", type="string", example="J949YJ 93"),
 *      @OA\Property(property="price_minute", type="integer", example=2),
 *     ),
 * ),
 * @OA\Schema(
 *  schema="CarRequest",
 *  title="CarRequest",
 *      @OA\Property(property="model_id", type="uuid", example="0b4932f2-5c19-4de2-9ddc-17ce2375d164"),
 *      @OA\Property(property="status", type="string", example="rented"),
 *      @OA\Property(property="mileage", type="integer", example=10383),
 *      @OA\Property(property="license_plate", type="string", example="J949YJ 93"),
 *      @OA\Property(property="location", type="string", example="-35.71 -45.96609"),
 *      @OA\Property(property="price_minute", type="integer", example=2),
 * ),
 * @OA\Schema(
 *  schema="CarChange",
 *  title="CarChange",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="ca327b1a-ed73-41c6-afe0-1eca33866ec3"),
 *      @OA\Property(property="model_id", type="uuid", example="0b4932f2-5c19-4de2-9ddc-17ce2375d164"),
 *      @OA\Property(property="status", type="string", example="rented"),
 *      @OA\Property(property="mileage", type="integer", example=10383),
 *      @OA\Property(property="license_plate", type="string", example="J949YJ 93"),
 *      @OA\Property(property="location", type="string", example="-35.71 -45.96609"),
 *      @OA\Property(property="price_minute", type="integer", example=2),
 *      ),
 * ),
 * @OA\Schema(
 *  schema="CarStatus",
 *  title="CarStatus",
 *      @OA\Property(property="status", type="string", example="expectation"),
 * ),
 * @OA\Schema(
 *  schema="CarMarkAll",
 *  title="CarMarkAll",
 *   @OA\Property(property="data", type="array",
 *       @OA\Items(
 *          @OA\Property(property="id", type="uuid", example="24a0f5c9-0a83-4b79-8bb2-173fa979749b"),
 *          @OA\Property(property="name", type="string", example="Volvo"),
 *       ),
 *    ),
 * ),
 * @OA\Schema(
 *  schema="CarMarkId",
 *  title="CarMarkId",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="46a4eeeb-e7d7-3d25-aa7a-496a94d44e75"),
 *      @OA\Property(property="name", type="string", example="Toyota"),
 *      ),
 * ),
 * @OA\Schema(
 *  schema="CarMarkRequest",
 *  title="CarMarkRequest",
 *      @OA\Property(property="name", type="string", example="BMW"),
 * ),
 * @OA\Schema(
 *  schema="CarMarkChange",
 *  title="CarMarkChange",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="6c117024-ff60-3020-bf74-dedddabc7dac"),
 *      @OA\Property(property="name", type="string", example="Audi"),
 *      ),
 * ),
 * @OA\Schema(
 *  schema="CarModelAll",
 *  title="CarModelAll",
 *   @OA\Property(property="data", type="array",
 *       @OA\Items(
 *          @OA\Property(property="id", type="uuid", example="b650e982-2e20-38be-8468-a378dcd2b4cf"),
 *          @OA\Property(property="mark_id", type="string", example="a7e3fc62-97ae-3344-89b3-d86483d06afb"),
 *          @OA\Property(property="name", type="string", example="Volvo"),
 *          @OA\Property(property="car_type", type="string", example="sedan"),
 *          @OA\Property(property="fuel_type", type="string", example="diesel"),
 *          @OA\Property(property="door_count", type="integer", example=4),
 *          @OA\Property(property="seat_count", type="integer", example=4),
 *          @OA\Property(property="gear_box", type="string", example="manual"),
 *          @OA\Property(property="drive_type", type="string", example="full"),
 *          @OA\Property(property="engine_power", type="integer", example=140),
 *          @OA\Property(property="year", type="integer", example=2022),
 *       ),
 *    ),
 * ),
 * @OA\Schema(
 *  schema="CarModelId",
 *  title="CarModelId",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="uuid", example="7513ae02-514e-38c9-bfa8-a70c14742d1c"),
 *      @OA\Property(property="mark_id", type="string", example="fbd8d2e1-056e-3f40-adf6-35408b6aba67"),
 *      @OA\Property(property="name", type="string", example="710"),
 *      @OA\Property(property="car_type", type="string", example="small"),
 *      @OA\Property(property="fuel_type", type="string", example="diesel"),
 *      @OA\Property(property="door_count", type="integer", example=4),
 *      @OA\Property(property="seat_count", type="integer", example=4),
 *      @OA\Property(property="gear_box", type="string", example="automatic"),
 *      @OA\Property(property="drive_type", type="string", example="full"),
 *      @OA\Property(property="engine_power", type="integer", example=300),
 *      @OA\Property(property="year", type="integer", example=2022),
 *      ),
 * ),
 * @OA\Schema(
 *  schema="CarModelRequest",
 *  title="CarModelRequest",
 *      @OA\Property(property="mark_id", type="string", example="1c1b68db-b6d5-3eaf-b0f2-b0be31c8e397"),
 *      @OA\Property(property="name", type="string", example="Renegade"),
 *      @OA\Property(property="car_type", type="string", example="sedan"),
 *      @OA\Property(property="fuel_type", type="string", example="gasoline"),
 *      @OA\Property(property="door_count", type="integer", example=4),
 *      @OA\Property(property="seat_count", type="integer", example=5),
 *      @OA\Property(property="gear_box", type="string", example="manual"),
 *      @OA\Property(property="drive_type", type="string", example="full"),
 *      @OA\Property(property="engine_power", type="integer", example=220),
 *      @OA\Property(property="year", type="integer", example=2022),
 * ),
 * @OA\Schema(
 *  schema="CarModelChange",
 *  title="CarModelChange",
 *  type="object",
 *  @OA\Property(property="data",type="object",
 *      @OA\Property(property="id", type="string", example="da8bdb3f-75b4-33da-9201-c2cbed141eff"),
 *      @OA\Property(property="mark_id", type="string", example="8619b523-32a3-3dda-aab3-cdcc25f9decf"),
 *      @OA\Property(property="name", type="string", example="Gonow"),
 *      @OA\Property(property="car_type", type="string", example="convertible"),
 *      @OA\Property(property="fuel_type", type="string", example="hybrid"),
 *      @OA\Property(property="door_count", type="integer", example=4),
 *      @OA\Property(property="seat_count", type="integer", example=5),
 *      @OA\Property(property="gear_box", type="string", example="automatic"),
 *      @OA\Property(property="drive_type", type="string", example="full"),
 *      @OA\Property(property="engine_power", type="integer", example=152),
 *      @OA\Property(property="year", type="integer", example=2022),
 *      ),
 * ),
 * @OA\Schema(
 *  schema="CarModelMark",
 *  title="CarModelMark",
 *      @OA\Property(property="mark_id", type="string", example="cf94810c-2bdb-32d9-99af-ee674c3c57b0"),
 * ),
 * @OA\Schema(
 *  schema="CarModelType",
 *  title="CarModelType",
 *      @OA\Property(property="car_type", type="string", example="hatchback"),
 * ),
 * @OA\Schema(
 *  schema="CarModelFuelType",
 *  title="CarModelFuelType",
 *      @OA\Property(property="fuel_type", type="string", example="gasoline"),
 * ),
 * @OA\Schema(
 *  schema="CarModelGearBoxType",
 *  title="CarModelGearBoxType",
 *      @OA\Property(property="gear_box", type="string", example="manual"),
 * ),
 * @OA\Schema(
 *  schema="CarModelDriveType",
 *  title="CarModelDriveType",
 *      @OA\Property(property="drive_type", type="string", example="full"),
 * ),
 * @OA\Schema(
 *  schema="Rent",
 *  title="Rent",
 *      @OA\Property(property="id", type="uuid", example="beceda62-2656-3617-97b9-b686a7d36e3b"),
 *      @OA\Property(property="car_id", type="uuid", example="40644966-2862-35d0-a7c6-ad87c512625a"),
 *      @OA\Property(property="arendator_id", type="uuid", example="63f081c5-1967-322f-9c2a-7f7b116441fc"),
 *      @OA\Property(property="status", type="string", example="open"),
 *      @OA\Property(property="start_datetime", type="string", example="2024-07-06 19:52:25"),
 *      @OA\Property(property="end_datetime", type="string", example="2024-07-06 19:52:25"),
 *      @OA\Property(property="rented_time", type="integer", example=720),
 *      @OA\Property(property="total_price", type="decimal", example=8658.32),
 * ),
 * @OA\Schema(
 *  schema="RentOpen",
 *  title="RentOpen",
 *      @OA\Property(property="car_id", type="uuid", example="40644966-2862-35d0-a7c6-ad87c512625a"),
 *      @OA\Property(property="arendator_id", type="uuid", example="63f081c5-1967-322f-9c2a-7f7b116441fc"),
 * ),
 * @OA\Schema(
 *  schema="RentClose",
 *  title="RentClose",
 *      @OA\Property(property="id", type="uuid", example="40644966-2862-35d0-a7c6-ad87c512625a"),
 * ),
 * @OA\Schema(
 *  schema="Transaction",
 *  title="Transaction",
 *      @OA\Property(property="id", type="uuid", example="c62bf9d4-865f-49da-ba56-ab4fa7528698"),
 *      @OA\Property(property="arendator_id", type="uuid", example="ae05a42b-9464-43df-83ed-dea6acf36f41"),
 *      @OA\Property(property="bill_id", type="uuid", example="4d380caf-18a7-31e8-93ed-e5d2b5d93251"),
 *      @OA\Property(property="modification", type="decimal", example=200.22),
 * ),
 * @OA\Schema(
 *  schema="TransactionCreate",
 *  title="TransactionCreate",
 *      @OA\Property(property="arendator_id", type="uuid", example="ae05a42b-9464-43df-83ed-dea6acf36f41"),
 *      @OA\Property(property="bill_id", type="uuid", example="4d380caf-18a7-31e8-93ed-e5d2b5d93251"),
 *      @OA\Property(property="modification", type="decimal", example=200.22),
 * ),
 * @OA\Schema(
 *  schema="Response401",
 *  title="Response401",
 *      @OA\Property(
 *          property="status",
 *          type="integer",
 *          example="401"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          type="string",
 *          example="Unauthorized"
 *    )
 * ),
 * @OA\Schema(
 *  schema="Response403",
 *  title="Response403",
 *      @OA\Property(
 *          property="status",
 *          type="integer",
 *          example="403"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          type="string",
 *          example="Forbidden"
 *    )
 * ),
 * @OA\Schema(
 *  schema="Response404",
 *  title="Response404",
 *      @OA\Property(
 *          property="status",
 *          type="integer",
 *          example="404"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          type="string",
 *          example="Not Found"
 *    )
 * ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
