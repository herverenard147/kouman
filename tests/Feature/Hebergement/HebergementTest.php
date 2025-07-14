<?php

namespace Tests\Feature;

use App\Models\FamilleTypeHebergements;
use Tests\TestCase;
use App\Models\Partenaire;
use App\Models\Hebergement;
use App\Models\PolitiquesAnnulation;
use App\Models\TypeHebergement;
use Database\Factories\TypeHebergementFactory;
use Database\Factories\PolitiquesAnnulationFactory;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class HebergementTest extends TestCase
{
    use RefreshDatabase;

    protected $partenaire;

  protected function setUp(): void
{
    parent::setUp();

    $this->partenaire = Partenaire::factory()->create([
        'mot_de_passe' => bcrypt('password'),
    ]);
}

    /** @test */
    public function un_partenaire_peut_afficher_la_liste_des_hebergements()
    {
        $this->actingAs($this->partenaire, 'partenaire');

        $response = $this->get(route('partenaire.hebergement'));

        $response->assertStatus(200);
        $response->assertViewIs('screens.add.Hebergement.hebergement');
    }

    /** @test */
    public function un_partenaire_peut_afficher_le_formulaire_de_creation()
    {
        $this->actingAs($this->partenaire, 'partenaire');

        $response = $this->get(route('partenaire.add.hebergement'));

        $response->assertStatus(200);
        $response->assertViewIs('screens.add.Hebergement.hebergement-add');
    }

    /** @test */
   /** @test */
public function un_partenaire_peut_creer_un_hebergement()
{
    // Créer les dépendances nécessaires
    $this->withMiddleware();
    $type = TypeHebergement::factory()->create();
    $politique = PolitiquesAnnulation::factory()->create();
    $familyType = FamilleTypeHebergements::factory()->create();

    $this->withoutMiddleware();
    $this->actingAs($this->partenaire, 'partenaire');

    $response = $this->post(route('partenaire.add.hebergement.store'), [
    'nom' => 'Hébergement Test',
    'description' => 'Description test',
    'prixParNuit' => 45000,
    'devise' => 'CFA',
    'idType' => $type->id,
    'idPartenaire' => $this->partenaire->id,
    'familyType' => $familyType->id,          // si tu as cette donnée obligatoire
    'idPolitiqueAnnulation' => $politique->id,
    'nombreChambres' => 2,
    'nombreSallesDeBain' => 1,
    'noteMoyenne' => 1,                        // si ce champ est dans ta table et attendu
    'numeroDeTel' => '22501020304',
    'capaciteMax' => 4,
    'heureArrivee' => '14:00',
    'heureDepart' => '15:00',                  // heureDepart doit être > heureArrivee sinon erreur validation
    'ville' => 'Abidjan',
    'pays' => 'Côte d\'Ivoire',
    'adresse' => 'Cocody Danga',
    'codePostal' => '00225',
    'latitude' => 5.348,
    'longitude' => -4.003,
    'images' => [UploadedFile::fake()->image('hebergement1.jpg')],
]);

    // dump($response); // à enlever une fois le test réussi

    $response->assertRedirect(route('partenaire.add.hebergement'));
    $this->assertDatabaseHas('hebergements', ['nom' => 'Hébergement Test']);
}


    /** @test */
public function test_un_partenaire_peut_afficher_le_detail_d_un_hebergement()
{
    // ✅ Création directe dans le test
    $partenaire = Partenaire::factory()->create([
        'mot_de_passe' => bcrypt('password'),
    ]);

    // ✅ Vérif : c'est bien une instance
    $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $partenaire);

    // ✅ Authentification avec le bon guard
    $this->actingAs($partenaire, 'partenaire');

    // ✅ Créer l'hébergement lié à ce partenaire
    $hebergement = Hebergement::factory()->create([
        'idPartenaire' => $partenaire->id,
    ]);

    // ✅ Appel de la route
    $response = $this->get(route('partenaire.hebergement-detail.show', $hebergement->id));

    // ✅ Assertions
    $response->assertStatus(200);
    $response->assertViewIs('screens.add.Hebergement.hebergement-detail');
}

    /** @test */
    public function un_partenaire_peut_afficher_le_formulaire_de_modification()
    {
        $this->actingAs($this->partenaire, 'partenaire');

        $hebergement = Hebergement::factory()->create([
            'idPartenaire' => $this->partenaire->id
        ]);

        $response = $this->get(route('partenaire.hebergement-detail.edit', $hebergement->id));

        $response->assertStatus(200);
        $response->assertViewIs('screens.add.Hebergement.hebergement-update');
    }

    /** @test */
    public function un_partenaire_peut_supprimer_un_hebergement()
    {
        $this->actingAs($this->partenaire, 'partenaire');

        $hebergement = Hebergement::factory()->create([
            'idPartenaire' => $this->partenaire->id
        ]);

        $response = $this->delete(route('partenaire.hebergement.destroy', $hebergement->id));

        $response->assertRedirect(route('partenaire.hebergement'));
        $this->assertDatabaseMissing('hebergements', ['id' => $hebergement->id]);
    }
}
