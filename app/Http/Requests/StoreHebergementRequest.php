<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreHebergementRequest extends FormRequest
{
     public function authorize(): bool
    {
        // Autoriser tous les partenaires connectés
        return Auth::guard('partenaire')->check();
    }

    public function rules(): array
    {
        // dd($this->all());
        return [
            'nom' => [
                'required',
                'string',
                'max:255',
                Rule::unique('hebergements', 'nom')
                    ->where(fn ($query) =>
                        $query->where('idPartenaire', Auth::guard('partenaire')->user()->id)
                    ),
            ],
            'idType' => ['required', 'exists:types_hebergement,id'],
            'familyType' => ['required', 'exists:familles_types_hebergement,id'],
            'description' => ['nullable', 'string'],
            'prixParNuit' => ['required', 'numeric', 'min:0'],
            'devise' => ['required', 'string', 'in:EUR,USD,GBP,CAD,AUD,CFA'],
            'idPolitiqueAnnulation' => ['nullable', 'exists:politiques_annulation,id'],
            'ville' => ['required', 'string', 'max:100'],
            'pays' => ['required', 'string', 'max:100'],
            'codePostal' => ['nullable', 'string', 'max:20'],
            'adresse' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'nombreChambres' => ['required', 'integer', 'min:0'],
            'nombreSallesDeBain' => ['required', 'integer', 'min:1'],
            'capaciteMax' => ['required', 'integer', 'min:1'],
            'heureArrivee' => ['nullable', 'date_format:H:i'],
            'telephones' => ['required', 'array'],
            // 'telephones.*.numero' => ['required', 'string', 'regex:/^\+225\d{8,}$/'], // Numéro au format ivoirien
            'heureDepart' => [
                'nullable',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    if ($this->heureArrivee && $value && $value <= $this->heureArrivee) {
                        $fail("L'heure de départ doit être postérieure à l'heure d'arrivée.");
                    }
                },
            ],
            'equipements' => ['nullable', 'array'],
            'equipements.*' => ['exists:equipements,id'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,mp4', 'max:10240'],
            'prixSaisonniers' => ['nullable', 'array'],
            'prixSaisonniers.*.dateDebut' => ['nullable', 'date', 'after:today'],
            'prixSaisonniers.*.dateFin' => ['nullable', 'date', 'after_or_equal:prixSaisonniers.*.dateDebut'],
            'prixSaisonniers.*.prixParNuit' => ['nullable', 'numeric', 'min:0'],
            'telephones.*.numero' => ['required', 'phone:CI,FR,US', 'distinct', 'max:20'],
            'stock' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de l’hébergement est requis.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'nom.unique' => 'Vous avez déjà un hébergement avec ce nom.',

            'idType.required' => 'Le type d’hébergement est requis.',
            'idType.exists' => 'Le type sélectionné est invalide.',

            'familyType.required' => 'La famille de type est requise.',
            'familyType.exists' => 'La famille sélectionnée est invalide.',

            'prixParNuit.required' => 'Le prix par nuit est requis.',
            'prixParNuit.numeric' => 'Le prix doit être un nombre.',
            'prixParNuit.min' => 'Le prix doit être positif.',

            'devise.required' => 'La devise est requise.',
            'devise.in' => 'Devise non reconnue.',

            'ville.required' => 'La ville est requise.',
            'pays.required' => 'Le pays est requis.',

            'nombreChambres.required' => 'Le nombre de chambres est requis.',
            'nombreSallesDeBain.required' => 'Le nombre de salles de bain est requis.',
            'capaciteMax.required' => 'La capacité maximale est requise.',

            'heureArrivee.date_format' => 'L\'heure d\'arrivée doit être au format HH:mm.',
            'heureDepart.date_format' => 'L\'heure de départ doit être au format HH:mm.',

            'images.required' => 'Au moins une image est requise.',
            'images.array' => 'Les images doivent être sous forme de tableau.',
            'images.*.image' => 'Chaque fichier doit être une image.',
            'images.*.mimes' => 'Formats acceptés : JPEG, PNG, JPG, MP4.',
            'images.*.max' => 'Chaque image doit faire moins de 10 Mo.',

            'equipements.*.exists' => 'Équipement invalide sélectionné.',

            'prixSaisonniers.*.dateDebut.after' => 'La date de début doit être après aujourd’hui.',
            'prixSaisonniers.*.dateFin.after_or_equal' => 'La date de fin doit être après la date de début.',
            'prixSaisonniers.*.prixParNuit.numeric' => 'Le prix saisonnier doit être un nombre.',

            'telephones.*.numero.required' => 'Le numéro de téléphone est requis.',
            'telephones.*.numero.phone' => 'Le numéro de téléphone doit être valide pour la Côte d’Ivoire, la France ou les États-Unis.',
            'telephones.*.numero.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',
            
            'stock.required' => 'Le stock est requis.',
            'stock.integer' => 'Le stock doit être un nombre entier.',
            'stock.min' => 'Le stock doit être au moins 0.',

        ];
    }
}
