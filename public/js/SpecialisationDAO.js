class SpecialisationDAO {
    constructor() {
        // Données hardcodées pour les détails des spécialisations
        this.detailsSpecialisations = {
            1: "Arms Warrior: Masters of two-handed weapons, focusing on slow but powerful attacks.",
            2: "Fury Warrior: Dual-wielding berserkers who thrive on relentless attacks.",
            3: "Protection Warrior: Sturdy defenders who protect their allies with shields and heavy armor.",
            4: "Arcane Mage: Wielders of pure arcane magic, specializing in burst damage.",
            5: "Fire Mage: Masters of fire spells, dealing damage over time with powerful explosions.",
            6: "Frost Mage: Controllers of ice, slowing and freezing enemies while dealing steady damage.",
            7: "Discipline Priest: A mix of healing and damage, using shields and absorption effects.",
            8: "Holy Priest: Pure healers, focusing on direct healing and support.",
            9: "Shadow Priest: Dealers of shadow damage, using damage-over-time spells and mind control."
        };
    }

    /**
     * Récupère les détails d'une spécialisation par son ID.
     * @param {number} id - L'ID de la spécialisation.
     * @returns {string} - Les détails de la spécialisation.
     */
    getDetailsById(id) {
        return this.detailsSpecialisations[id] || "Détails non disponibles.";
    }

    /**
     * Affiche les détails d'une spécialisation dans la zone d'affichage.
     * @param {number} id - L'ID de la spécialisation.
     */
    afficherDetailSpecialisation(id) {
        const details = this.getDetailsById(id);
        document.getElementById("zone-affichage").innerHTML = details;
    }
}

// Instanciation de la classe SpecialisationDAO
const specialisationDAO = new SpecialisationDAO();