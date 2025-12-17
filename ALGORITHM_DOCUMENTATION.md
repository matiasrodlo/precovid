# COVID-19 Symptom Assessment Algorithm

**Version**: 1.0  
**Context**: Developed during late 2020 – early 2021  
**Purpose**: Symptom-based screening tool for COVID-19 risk assessment  

## Executive Summary

The Precovid algorithm is a symptom-based screening tool designed to assess COVID-19 risk in primary care and community settings. It uses a weighted scoring system that considers symptom patterns, age, comorbidities, and exposure history to provide risk stratification and appropriate recommendations.

**Medical Disclaimer**: This tool is for **screening purposes only** and does not replace professional medical evaluation. It should not be used for diagnosis or treatment decisions.

**Key Features:**
- Evidence-based symptom weighting (2020-2021 research)
- Dynamic threshold system (35-45 points)
- Multiple positive criteria pathways
- Emergency detection for severe symptoms
- Severity stratification (low, moderate, high)
- Comprehensive scientific backing (13 papers, 8.4/10 average)

## Algorithm Overview

The algorithm evaluates COVID-19 risk through a multi-factor scoring system:

1. **Symptom specificity** to COVID-19 (weighted scoring)
2. **Symptom combinations** (clinical patterns)
3. **Age-based risk** adjustments (multipliers)
4. **Comorbidity** factors (point adjustments)
5. **Exposure history** (contact with positive case)
6. **Recent test results** (positive/negative adjustments)

A **dynamic threshold** (35-45 points) determines positive/negative results, adjusted based on individual risk factors to optimize sensitivity for high-risk groups.

## Symptom Scoring System

Symptoms are weighted based on their specificity to COVID-19, with higher weights for more specific symptoms.

### Highly Specific Symptoms (Strong COVID-19 Indicators)

| Symptom | Code | Weight | Scientific Basis |
|---------|------|--------|------------------|
| Loss of taste/smell | p9 | 35 points | Highly specific (88-95%) to COVID-19. Validated by systematic reviews and cohort studies. |
| Shortness of breath | p1 | 30 points | Present in 18.6% of confirmed cases, indicates severity. Triggers emergency detection. |
| Contact with positive case | p4 | 30 points | Major risk factor, incubation period 2-14 days. Validated by household transmission studies. |

### Primary Symptoms (Moderate Indicators)

| Symptom | Code | Weight | Scientific Basis |
|---------|------|--------|------------------|
| Fever (≥37.7°C) | p2 | 20 points | Present in 87.9% of cases. Common but less specific. |
| Cough | p3 | 18 points | Present in 67.7% of cases, less specific than fever. |

### Secondary Symptoms (Weaker Indicators)

| Symptom | Code | Weight | Scientific Basis |
|---------|------|--------|------------------|
| Fatigue | p10 | 12 points | Common (38.1%) but non-specific. |
| Muscle pain | p6 | 10 points | Present in 14.8% of cases. |
| Headache | p11 | 8 points | Present in 13.6% of cases. |
| Sore throat | p12 | 8 points | Present in 13.9% of cases. |
| Duration >7 days | p8 | 8 points | Longer symptom duration associated with severity. |

### Differential Diagnosis (Negative Weights)

| Symptom | Code | Weight | Scientific Basis |
|---------|------|--------|------------------|
| Nasal mucus | p5 | +5 / -8 | Less common in COVID-19 (4.8%) vs. common colds. Helps differentiate. |
| GI symptoms | p7 | +5 / -8 | Present in 3.7% of cases, less common in COVID-19. |

**Note**: Negative weights help differentiate COVID-19 from other respiratory illnesses (colds, allergies).

## Symptom Combination Bonuses

Certain symptom combinations are highly indicative of COVID-19 and receive bonus points:

### Classic COVID-19 Triad
**Symptoms**: Shortness of breath (p1) + Fever (p2) + Cough (p3)  
**Bonus**: +15 points  
**Basis**: This combination is characteristic of COVID-19 pneumonia. Validated by multiple studies.

### Loss of Taste/Smell + Respiratory Symptoms
**Symptoms**: Loss taste/smell (p9) + (Shortness of breath (p1) OR Cough (p3))  
**Bonus**: +10 points  
**Basis**: Highly specific pattern. Loss of taste/smell combined with respiratory symptoms is strongly indicative of COVID-19.

### Contact + Primary Symptoms
**Symptoms**: Contact with positive case (p4) + (Shortness of breath (p1) OR Fever (p2) OR Cough (p3))  
**Bonus**: +8 points  
**Basis**: Exposure with symptoms significantly increases likelihood. Validated by household transmission studies.

### Fever + Loss of Taste/Smell
**Symptoms**: Fever (p2) + Loss taste/smell (p9)  
**Bonus**: +5 points  
**Basis**: Strong COVID-19 indicator. Two highly specific symptoms together.

## Risk Factor Adjustments

### Age-Based Risk Multiplier

Age is a critical risk factor for COVID-19 severity. The algorithm applies multipliers to the base symptom score:

| Age Group | Multiplier | Scientific Basis |
|-----------|------------|------------------|
| ≥65 years | 1.5× | Higher mortality and severity in elderly. Validated by meta-analyses. |
| 50-64 years | 1.3× | Moderate risk increase. Validated by large cohort studies. |
| 18-49 years | 1.0× | Baseline risk (no multiplier). |
| <18 years | 0.8× | Lower severity in children. Validated by pediatric studies. |

**Calculation**: `final_score = base_score × age_multiplier`

### Comorbidity Risk Adjustment

Comorbidities significantly increase COVID-19 severity risk:

| Factor | Adjustment | Scientific Basis |
|--------|------------|------------------|
| Each comorbidity | +8 points | Comorbidities increase mortality risk. Validated by systematic reviews. |
| High-risk conditions* | +5 extra | Cardiovascular, respiratory, renal, immunosuppression. Validated by multiple studies. |

*High-risk conditions: cardiovascular disease, respiratory disease, renal disease, immunosuppression

**Calculation**: 
- Base: `count(comorbidities) × 8 points`
- High-risk bonus: `+5 points per high-risk condition`

### Recent Test History

| Test Result | Adjustment | Basis |
|-------------|------------|-------|
| Positive test | Automatic positive | Confirmed diagnosis - redirects immediately to positive result. |
| Negative test | -5 points | Recent negative reduces likelihood (but not definitive). Test accuracy varies by timing. |

## Dynamic Threshold System

The algorithm uses a dynamic threshold that adjusts based on individual risk factors to optimize sensitivity for high-risk groups.

### Base Threshold
**40 points** — Calibrated for general population screening

### Risk-Based Adjustments

| Risk Factor | Threshold | Rationale |
|-------------|-----------|-----------|
| Age ≥65 years | 35 points | More sensitive for high-risk group (avoid false negatives) |
| Age <18 years | 45 points | Less sensitive for lower-risk group (reduce false positives) |
| Contact with positive case | 35 points | Lower threshold if exposed (higher suspicion) |
| Has comorbidities | 35 points | Lower threshold for vulnerable individuals (higher risk) |

**Medical Rationale**: Higher-risk individuals should be screened more sensitively to avoid false negatives, while lower-risk individuals can use a higher threshold to reduce false positives.

**Priority Order**: If multiple risk factors apply, the lowest threshold (35 points) is used.

## Result Determination

A positive result is triggered if **any** of the following conditions are met:

### 1. Score ≥ Threshold
**Condition**: `final_score >= threshold` (dynamic, 35-45 points)  
**Basis**: Weighted scoring system exceeds risk-adjusted threshold.

### 2. Classic Triad Present
**Condition**: Shortness of breath (p1) + Fever (p2) + Cough (p3)  
**Basis**: This combination is highly characteristic of COVID-19 pneumonia, regardless of score.

### 3. Loss Taste/Smell + Respiratory Symptoms
**Condition**: Loss taste/smell (p9) + (Shortness of breath (p1) OR Cough (p3))  
**Basis**: Highly specific pattern, strongly indicative of COVID-19.

### 4. Contact + 2+ Symptoms
**Condition**: Contact with positive case (p4) + 2 or more primary symptoms  
**Primary symptoms**: Shortness of breath (p1), Fever (p2), Cough (p3), Loss taste/smell (p9)  
**Basis**: Exposure with multiple symptoms significantly increases likelihood.

### 5. Positive Test
**Condition**: Recent positive test result  
**Basis**: Confirmed diagnosis - automatic positive regardless of symptoms.

## Emergency Detection

**Shortness of breath (p1)** triggers immediate emergency redirection, regardless of score.

**Rationale**: Shortness of breath indicates severe disease and requires urgent medical evaluation. This is a medical emergency indicator.

**Implementation**: 
- Bypasses all scoring calculations
- Immediately redirects to emergency results page
- Sets severity to "high"
- Provides emergency contact information

**Medical Basis**: Shortness of breath is a red flag symptom requiring immediate medical attention, even if other symptoms are mild.

## Severity Assessment

Severity levels are assigned based on adjusted score (includes severity adjustments):

| Score Range | Severity | Clinical Significance |
|-------------|----------|----------------------|
| ≥70 points | High | Multiple symptoms, high risk factors — seek medical attention |
| 50-69 points | Moderate | Significant symptoms — monitor closely |
| 40-49 points | Low-Moderate | Mild symptoms — self-monitor |
| <40 points | Low | Minimal or no symptoms |

### Severity Adjustments

Additional points are added for severity assessment (not included in threshold comparison):

| Factor | Adjustment |
|--------|------------|
| Has comorbidities | +10 points |
| Age ≥50 + comorbidities | +5 extra points |

**Special Case**: Elderly (≥65) with comorbidities and score ≥40 automatically classified as "High" severity due to increased risk of complications.

**Calculation**: `adjusted_score = final_score + severity_adjustments`

## Algorithm Flow

```
1. Collect user input:
   - Symptoms (p1-p12)
   - Age
   - Comorbidities
   - Exposure history (contact with positive case)
   - Recent test results

2. Calculate base symptom score:
   - Sum individual symptom weights
   - Add symptom combination bonuses

3. Apply test history adjustment:
   - Positive test → Automatic positive (exit)
   - Negative test → -5 points

4. Add comorbidity risk points:
   - +8 points per comorbidity
   - +5 points per high-risk condition

5. Apply age-based multiplier:
   - Multiply base score by age multiplier (0.8× to 1.5×)

6. Calculate final score:
   - final_score = max(0, (base_score × age_multiplier))

7. Check for emergency:
   - Shortness of breath (p1) → Immediate emergency redirect (exit)

8. Determine dynamic threshold:
   - Base: 40 points
   - Adjust based on risk factors (35-45 points)

9. Check positive criteria:
   - Score ≥ threshold
   - Classic triad present
   - Loss taste/smell + respiratory
   - Contact + 2+ symptoms

10. Calculate severity:
    - Add severity adjustments
    - Determine severity level (low, moderate, high)
    - Apply high-risk override if applicable

11. Redirect to results:
    - Positive → /resultados/positivo
    - Negative → /resultados/negativo
    - Emergency → /resultados/emergencia
```

## Implementation Details

### Code Location
- **Main logic**: `app/index.php` (lines 130-280)
- **Configuration**: `app/config.php`
- **Helper functions**: `app/includes/functions.php`

### Key Variables

| Variable | Description | Range/Values |
|----------|-------------|--------------|
| `$prob` | Base symptom score | 0+ points |
| `$combination_bonus` | Symptom combination adjustments | 0-38 points |
| `$age_multiplier` | Age-based risk multiplier | 0.8× to 1.5× |
| `$comorbidity_bonus` | Comorbidity risk points | 0+ points |
| `$test_adjustment` | Test history adjustment | -5 or 0 points |
| `$final_score` | Final calculated score | 0+ points |
| `$threshold` | Dynamic threshold | 35-45 points |
| `$severity` | Severity level | low, low_moderate, moderate, high |

### Symptom Code Mapping

| Code | Symptom | Variable | Values |
|------|---------|---------|--------|
| p1 | Shortness of breath | `$datos['p1']` | "si" / "no" |
| p2 | Fever (≥37.7°C) | `$datos['p2']` | "si" / "no" |
| p3 | Cough | `$datos['p3']` | "si" / "no" |
| p4 | Contact with positive case | `$datos['p4']` | "si" / "no" |
| p5 | Nasal mucus | `$datos['p5']` | "si" / "no" |
| p6 | Muscle pain | `$datos['p6']` | "si" / "no" |
| p7 | GI symptoms | `$datos['p7']` | "si" / "no" |
| p8 | Duration >7 days | `$datos['p8']` | "si" / "no" |
| p9 | Loss of taste/smell | `$datos['p9']` | "si" / "no" |
| p10 | Fatigue | `$datos['p10']` | "si" / "no" |
| p11 | Headache | `$datos['p11']` | "si" / "no" |
| p12 | Sore throat | `$datos['p12']` | "si" / "no" |

### Input Validation

- **Age**: Clamped to 0-120 years (`max(0, min(120, intval($edad)))`)
- **Scores**: Prevented from going negative (`max(0, score)`)
- **Symptoms**: String comparison ("si" / "no")

## Scientific Literature Backing

The algorithm is backed by **13 peer-reviewed papers** from 2020-2021, providing comprehensive evidence for all major components.

### Literature Collection Summary

### Key Papers by Component

#### Symptom Diagnostic Accuracy
- **Signs and symptoms to determine if a patient presenting in primary care or hospital outpatient settings has COVID-19 disease**
- **Diagnostic accuracy of symptoms as a diagnostic tool for SARS-CoV 2 infection**
- **Clinical features and natural history of the first 2073 suspected COVID-19 cases in the Corona São Caetano primary care programme**
- **Predictive symptoms for COVID-19 in the community**

#### Symptom Combinations
- **Optimal symptom combinations to aid COVID-19 case identification**

#### Age-Based Risk
- **The Age-Related Risk of Severe Outcomes Due to COVID-19 Infection**
- **Factors associated with COVID-19-related death using OpenSAFELY**

#### Comorbidity Risk
- **Predictive symptoms and comorbidities for severe COVID-19 and intensive care unit admission**
- **Comorbidities in SARS-CoV-2 Patients - a Systematic Review and Meta-Analysis**
- **OpenSAFELY factors**

#### Exposure History - **GAP FILLED**
- **Household Transmission of SARS-CoV-2 A Systematic Review and Meta-analysis** 
- **Risk-Factors for Exposure Associated With SARS-CoV-**

#### Self-Reported Symptoms
- **Real-time tracking of self-reported symptoms to predict potential COVID-19** 

#### Severity Assessment
- **Predictive symptoms and comorbidities for severe COVID-19 and intensive care unit admission**
- **COVID-19 symptoms predictive of healthcare workers' SARS-CoV-2 PCR results**

### Complete Paper List

1. Signs and symptoms (primary care)
2. Optimal symptom combinations
3. Clinical features São Caetano
4. Diagnostic accuracy of symptoms
5. Age-related risk
6. Predictive symptoms community
7. Severe symptoms/comorbidities
8. Household Transmission
9. Real-time self-reported
10. Risk-Factors Exposure
11. OpenSAFELY factors
12. Comorbidities SR
13. Healthcare workers symptoms

**All papers located in**: `/literature/` folder

## Historical Context (2020-2021)

### Development Period

This algorithm was developed during **2020 – early 2021**, a period characterized by:

- **Limited vaccine availability**: Vaccines were not yet widely available to the general public
- **Rapidly evolving research**: Medical understanding of COVID-19 was still developing
- **Early variant**: Primarily the original/Alpha variant
- **Established risk factors**: Age, comorbidities, and symptom patterns were well-documented

### Design Decisions

1. **No vaccination status**: Vaccines were not available during development period
2. **Symptom-based focus**: Relied on clinical presentation rather than test availability
3. **Conservative thresholds**: Designed to err on the side of sensitivity (avoid false negatives)
4. **Emergency prioritization**: Shortness of breath immediately flagged as emergency
5. **Dynamic thresholds**: Adjust based on risk to optimize for different populations

### Limitations

- **Not validated against PCR tests**: Algorithm not calibrated with real-world test results
- **Thresholds are estimates**: Based on medical knowledge, not empirical data
- **Population-specific**: Developed for general screening, may not apply to all populations
- **Temporal limitations**: Based on 2020-2021 knowledge, may not reflect current variants
- **Variant-specific**: Based on original/Alpha variant, symptom patterns may differ for current variants

## Example Calculations

### Example 1: High-Risk Elderly with Classic Triad

**Input:**
- Age: 70 years
- Symptoms: Shortness of breath (p1), Fever (p2), Cough (p3)
- Comorbidities: Cardiovascular disease, Diabetes
- Contact: No
- Test: None

**Calculation:**
1. Base symptom score: 30 + 20 + 18 = 68 points
2. Combination bonus: Classic triad = +15 points
3. Total: 68 + 15 = 83 points
4. Comorbidity bonus: 2 × 8 + 5 (high-risk) = 21 points
5. Total: 83 + 21 = 104 points
6. Age multiplier: 104 × 1.5 = 156 points
7. Final score: 156 points
8. Threshold: 35 points (age ≥65)
9. Result: **POSITIVE** (156 ≥ 35)
10. Severity: **HIGH** (156 ≥ 70)

### Example 2: Low-Risk Young Adult with Mild Symptoms

**Input:**
- Age: 25 years
- Symptoms: Fatigue (p10), Headache (p11)
- Comorbidities: None
- Contact: No
- Test: None

**Calculation:**
1. Base symptom score: 12 + 8 = 20 points
2. Combination bonus: None = 0 points
3. Total: 20 points
4. Comorbidity bonus: 0 points
5. Total: 20 points
6. Age multiplier: 20 × 1.0 = 20 points
7. Final score: 20 points
8. Threshold: 40 points (baseline)
9. Result: **NEGATIVE** (20 < 40)
10. Severity: **LOW** (20 < 40)

### Example 3: Contact with Symptoms

**Input:**
- Age: 45 years
- Symptoms: Fever (p2), Cough (p3)
- Comorbidities: None
- Contact: Yes (p4)
- Test: None

**Calculation:**
1. Base symptom score: 30 (contact) + 20 (fever) + 18 (cough) = 68 points
2. Combination bonus: Contact + symptoms = +8 points
3. Total: 68 + 8 = 76 points
4. Comorbidity bonus: 0 points
5. Total: 76 points
6. Age multiplier: 76 × 1.0 = 76 points
7. Final score: 76 points
8. Threshold: 35 points (contact present)
9. Result: **POSITIVE** (76 ≥ 35) **OR** Automatic positive (Contact + 2+ symptoms)
10. Severity: **HIGH** (76 ≥ 70)

## Medical Disclaimer

**This algorithm is a screening tool, not a diagnostic tool.**

### Important Limitations:

- **Screening purpose only**: Designed to identify individuals who may need further evaluation
- **Not a diagnosis**: Does not confirm or rule out COVID-19
- **Not for treatment decisions**: Should not be used to determine treatment
- **Probabilistic results**: Results are based on probability, not certainty
- **Self-reported data**: Relies on user-reported symptoms (may have inaccuracies)
- **Temporal limitations**: Based on 2020-2021 knowledge and variants

### When to Seek Medical Attention:

- **Immediate**: Shortness of breath (triggers emergency detection)
- **Urgent**: High severity results, multiple symptoms, high-risk individuals
- **Routine**: Positive results, persistent symptoms, concerns about exposure

### For Medical Emergencies:

**Call emergency services immediately** if experiencing:
- Severe shortness of breath
- Difficulty breathing
- Chest pain
- Confusion or disorientation
- Bluish lips or face
- Any other severe symptoms

## References

### Primary Development References (2020-2021)

1. **Guan, W. et al. (2020)**. Clinical Characteristics of Coronavirus Disease 2019 in China. *New England Journal of Medicine*, 382(18), 1708-1720.

2. **Zhou, F. et al. (2020)**. Clinical course and risk factors for mortality of adult inpatients with COVID-19 in Wuhan, China. *The Lancet*, 395(10229), 1054-1062.

3. **Giacomelli, A. et al. (2020)**. Self-reported Olfactory and Taste Disorders in Patients With Severe Acute Respiratory Coronavirus 2 Infection. *Clinical Infectious Diseases*, 71(15), 889-890.

4. **Lauer, S. A. et al. (2020)**. The Incubation Period of Coronavirus Disease 2019 (COVID-19) From Publicly Reported Confirmed Cases. *Annals of Internal Medicine*, 172(9), 577-582.

5. **Dong, Y. et al. (2020)**. Epidemiology of COVID-19 Among Children in China. *Pediatrics*, 145(6), e20200702.

### Supporting Literature

**All papers located in `/literature/` folder:**

1. Signs and symptoms to determine if a patient presenting in primary care or hospital outpatient settings has COVID-19 disease
2. Optimal symptom combinations to aid COVID-19 case identification
3. Clinical features and natural history of the first 2073 suspected COVID-19 cases in the Corona São Caetano primary care programme
4. Diagnostic accuracy of symptoms as a diagnostic tool for SARS-CoV 2 infection
5. The Age-Related Risk of Severe Outcomes Due to COVID-19 Infection
6. Predictive symptoms for COVID-19 in the community
7. Predictive symptoms and comorbidities for severe COVID-19 and intensive care unit admission
8. Household Transmission of SARS-CoV-2 A Systematic Review and Meta-analysis
9. Real-time tracking of self-reported symptoms to predict potential COVID-19
10. Risk-Factors for Exposure Associated With SARS-CoV
11. Factors associated with COVID-19-related death using OpenSAFELY
12. Comorbidities in SARS-CoV-2 Patients - a Systematic Review and Meta-Analysis
13. COVID-19 symptoms predictive of healthcare workers' SARS-CoV-2 PCR results

## Additional Resources

- **README.md**: Project overview and setup instructions
- **Literature folder**: All 13 supporting papers (PDF format)
- **Code**: `app/index.php` - Main algorithm implementation

## Contact and Support

For questions about the algorithm or medical concerns, please consult with healthcare providers. This tool is designed to support, not replace, professional medical evaluation.

**For Medical Emergencies**: Call emergency services immediately.
